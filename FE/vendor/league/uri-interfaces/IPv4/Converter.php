<?php

/**
 * League.Uri (https://uri.thephpleague.com)
 *
 * (c) Ignace Nyamagana Butera <nyamsprod@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace League\Uri\IPv4;

use League\Uri\Exceptions\MissingFeature;
use League\Uri\FeatureDetection;
use Stringable;

use function array_pop;
use function count;
use function explode;
use function extension_loaded;
use function ltrim;
use function preg_match;
use function str_ends_with;
use function substr;

final class Converter
{
    private const REGEXP_IPV4_HOST = '/
        (?(DEFINE) # . is missing as it is used to separate labels
            (?<hexadecimal>0x[[:xdigit:]]*)
            (?<octal>0[0-7]*)
            (?<decimal>\d+)
            (?<ipv4_part>(?:(?&hexadecimal)|(?&octal)|(?&decimal))*)
        )
        ^(?:(?&ipv4_part)\.){0,3}(?&ipv4_part)\.?$
    /x';
    private const REGEXP_IPV4_NUMBER_PER_BASE = [
        '/^0x(?<number>[[:xdigit:]]*)$/' => 16,
        '/^0(?<number>[0-7]*)$/' => 8,
        '/^(?<number>\d+)$/' => 10,
    ];

    private readonly mixed $maxIPv4Number;

    public function __construct(
        private readonly Calculator $calculator
    ) {
        $this->maxIPv4Number = $calculator->sub($calculator->pow(2, 32), 1);
    }

    /**
     * Returns an instance using a GMP calculator.
     */
    public static function fromGMP(): self
    {
        return new self(new GMPCalculator());
    }

    /**
     * Returns an instance using a Bcmath calculator.
     */
    public static function fromBCMath(): self
    {
        return new self(new BCMathCalculator());
    }

    /**
     * Returns an instance using a PHP native calculator (requires 64bits PHP).
     */
    public static function fromNative(): self
    {
        return new self(new NativeCalculator());
    }

    /**
     * Returns an instance using a detected calculator depending on the PHP environment.
     *
     * @throws MissingFeature If no Calculator implementing object can be used on the platform
     *
     * @codeCoverageIgnore
     */
    public static function fromEnvironment(): self
    {
        FeatureDetection::supportsIPv4Conversion();

        return match (true) {
            extension_loaded('gmp') => self::fromGMP(),
            extension_loaded('bcmath') => self::fromBCMath(),
            default => self::fromNative(),
        };
    }

    public function isIpv4(Stringable|string|null $host): bool
    {
        return null !== $this->toDecimal($host);
    }

    public function toOctal(Stringable|string|null $host): ?string
    {
        $host = $this->toDecimal($host);

        return match (null) {
            $host => null,
            default => implode('.', array_map(
                fn ($value) => str_pad(decoct((int) $value), 4, '0', STR_PAD_LEFT),
                explode('.', $host)
            )),
        };
    }

    public function toHexadecimal(Stringable|string|null $host): ?string
    {
        $host = $this->toDecimal($host);

        return match (null) {
            $host => null,
            default => '0x'.implode('', array_map(
                fn ($value) => dechex((int) $value),
                explode('.', $host)
            )),
        };
    }

    /**
     * Tries to convert a IPv4 hexadecimal or a IPv4 octal notation into a IPv4 dot-decimal notation if possible
     * otherwise returns null.
     *
     * @see https://url.spec.whatwg.org/#concept-ipv4-parser
     */
    public function toDecimal(Stringable|string|null $host): ?string
    {
        $host = (string) $host;
        if (1 !== preg_match(self::REGEXP_IPV4_HOST, $host)) {
            return null;
        }

        if (str_ends_with($host, '.')) {
            $host = substr($host, 0, -1);
        }

        $numbers = [];
        foreach (explode('.', $host) as $label) {
            $number = $this->labelToNumber($label);
            if (null === $number) {
                return null;
            }

            $numbers[] = $number;
        }

        $ipv4 = array_pop($numbers);
        $max = $this->calculator->pow(256, 6 - count($numbers));
        if ($this->calculator->compare($ipv4, $max) > 0) {
            return null;
        }

        foreach ($numbers as $offset => $number) {
            if ($this->calculator->compare($number, 255) > 0) {
                return null;
            }

            $ipv4 = $this->calculator->add($ipv4, $this->calculator->multiply(
                $number,
                $this->calculator->pow(256, 3 - $offset)
            ));
        }

        return $this->long2Ip($ipv4);
    }

    /**
     * Converts a domain label into a IPv4 integer part.
     *
     * @see https://url.spec.whatwg.org/#ipv4-number-parser
     *
     * @return mixed returns null if it cannot correctly convert the label
     */
    private function labelToNumber(string $label): mixed
    {
        foreach (self::REGEXP_IPV4_NUMBER_PER_BASE as $regexp => $base) {
            if (1 !== preg_match($regexp, $label, $matches)) {
                continue;
            }

            $number = ltrim($matches['number'], '0');
            if ('' === $number) {
                return 0;
            }

            $number = $this->calculator->baseConvert($number, $base);
            if (0 <= $this->calculator->compare($number, 0) && 0 >= $this->calculator->compare($number, $this->maxIPv4Number)) {
                return $number;
            }
        }

        return null;
    }

    /**
     * Generates the dot-decimal notation for IPv4.
     *
     * @see https://url.spec.whatwg.org/#concept-ipv4-parser
     *
     * @param mixed $ipAddress the number representation of the IPV4address
     */
    private function long2Ip(mixed $ipAddress): string
    {
        $output = '';
        for ($offset = 0; $offset < 4; $offset++) {
            $output = $this->calculator->mod($ipAddress, 256).$output;
            if ($offset < 3) {
                $output = '.'.$output;
            }
            $ipAddress = $this->calculator->div($ipAddress, 256);
        }

        return $output;
    }
}
