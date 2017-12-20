<?php namespace GGDX\PhpInsightly\Traits;

trait Helpers{


    /**
     * Uppercase array keys
     *
     * Insightly insists on the use of UPPERCASE KEYS, let's face it - it's both a ball-ache and just not natural.
     * This method will format keys accordingly.
     *
     * @param array $data Associative array to ship off to Insightly
     * @return array
     */
    private function dataKeysToUpper($data)
    {
        foreach ($data as $key => $value) {

            if (strtoupper($key) !== $key) {

                $data[strtoupper($key)] = $value;
                unset($data[$key]);
                
            }

        }

        return $data;
    }
}
