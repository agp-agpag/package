<?php


namespace Agp\Agpag\Model;


class Entity
{
    public function toArray($attributes = null)
    {
        $result = null;

        if (is_null($attributes)) {
            $result = get_object_vars($this);
        } else {
            $result = array_intersect_key(get_object_vars($this), $attributes);
        }

        foreach ($result as $key => $value) {
            if (!is_bool($value) && empty($value)) {
                unset($result[$key]);
            }

            if(is_object($value)) {
                $result[$key] = $value->toArray();
            }
        }

        return $result;

    }

    public function toJson()
    {
        return json_encode($this->toArray());
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __get($name)
    {
        return $this->$name;
    }
}
