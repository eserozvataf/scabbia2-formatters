<?php
/**
 * Scabbia2 Formatters Component
 * https://github.com/eserozvataf/scabbia2
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @link        https://github.com/eserozvataf/scabbia2-formatters for the canonical source repository
 * @copyright   2010-2016 Eser Ozvataf. (http://eser.ozvataf.com/)
 * @license     http://www.apache.org/licenses/LICENSE-2.0 - Apache License, Version 2.0
 */

namespace Scabbia\Formatters;

use Scabbia\Formatters\FormatterInterface;

/**
 * Implementation for generation of console-compatible output
 *
 * @package     Scabbia\Formatters
 * @author      Eser Ozvataf <eser@ozvataf.com>
 * @since       2.0.0
 *
 * @todo add stdin features
 */
class ConsoleFormatter implements FormatterInterface
{
    /**
     * Writes given message in header format
     *
     * @param int    $uHeading size
     * @param string $uMessage message
     *
     * @return void
     */
    public function writeHeader($uHeading, $uMessage)
    {
        if ($uHeading === 1) {
            $tChar = "=";
        } else {
            $tChar = "-";
        }

        echo $uMessage, PHP_EOL, str_repeat($tChar, strlen($uMessage)), PHP_EOL;

        if ($uHeading === 1) {
            echo PHP_EOL;
        }
    }

    /**
     * Writes given message in specified color
     *
     * @param string $uColor   color
     * @param string $uMessage message
     *
     * @return void
     */
    public function writeColor($uColor, $uMessage)
    {
        if (strncasecmp(PHP_OS, "WIN", 3) === 0) {
            echo $uMessage, PHP_EOL;
            return;
        }

        if ($uColor === "black") {
            $tColor = "[0;30m";
        } elseif ($uColor === "darkgray") {
            $tColor = "[1;30m";
        } elseif ($uColor === "blue") {
            $tColor = "[0;34m";
        } elseif ($uColor === "lightblue") {
            $tColor = "[1;34m";
        } elseif ($uColor === "green") {
            $tColor = "[0;32m";
        } elseif ($uColor === "lightgreen") {
            $tColor = "[1;32m";
        } elseif ($uColor === "cyan") {
            $tColor = "[0;36m";
        } elseif ($uColor === "lightcyan") {
            $tColor = "[1;36m";
        } elseif ($uColor === "red") {
            $tColor = "[0;31m";
        } elseif ($uColor === "lightred") {
            $tColor = "[1;31m";
        } elseif ($uColor === "purple") {
            $tColor = "[0;35m";
        } elseif ($uColor === "lightpurple") {
            $tColor = "[1;35m";
        } elseif ($uColor === "brown") {
            $tColor = "[0;33m";
        } elseif ($uColor === "yellow") {
            $tColor = "[1;33m";
        } elseif ($uColor === "white") {
            $tColor = "[1;37m";
        } else /* if ($uColor === "lightgray") */ {
            $tColor = "[0;37m";
        }

        echo "\033", $tColor, $uMessage, "\033[0m", PHP_EOL;
    }

    /**
     * Writes given message
     *
     * @param string $uMessage message
     *
     * @return void
     */
    public function write($uMessage)
    {
        echo $uMessage, PHP_EOL;
    }

    /**
     * Outputs the array to console
     *
     * @param array $uArray Target array will be printed
     *
     * @return void
     */
    public function writeArray(array $uArray)
    {
        print_r($uArray);
    }
}
