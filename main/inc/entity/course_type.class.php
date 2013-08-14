<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @license see /license.txt
 * @author autogenerated
 */
class CourseType extends \Entity
{
    /**
     * @return \Entity\Repository\CourseTypeRepository
     */
     public static function repository(){
        return \Entity\Repository\CourseTypeRepository::instance();
    }

    /**
     * @return \Entity\CourseType
     */
     public static function create(){
        return new self();
    }

    /**
     * @var integer $id
     */
    protected $id;

    /**
     * @var string $name
     */
    protected $name;

    /**
     * @var string $translation_var
     */
    protected $translation_var;

    /**
     * @var text $description
     */
    protected $description;

    /**
     * @var text $props
     */
    protected $props;


    /**
     * Get id
     *
     * @return integer 
     */
    public function get_id()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $value
     * @return CourseType
     */
    public function set_name($value)
    {
        $this->name = $value;
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function get_name()
    {
        return $this->name;
    }

    /**
     * Set translation_var
     *
     * @param string $value
     * @return CourseType
     */
    public function set_translation_var($value)
    {
        $this->translation_var = $value;
        return $this;
    }

    /**
     * Get translation_var
     *
     * @return string 
     */
    public function get_translation_var()
    {
        return $this->translation_var;
    }

    /**
     * Set description
     *
     * @param text $value
     * @return CourseType
     */
    public function set_description($value)
    {
        $this->description = $value;
        return $this;
    }

    /**
     * Get description
     *
     * @return text 
     */
    public function get_description()
    {
        return $this->description;
    }

    /**
     * Set props
     *
     * @param text $value
     * @return CourseType
     */
    public function set_props($value)
    {
        $this->props = $value;
        return $this;
    }

    /**
     * Get props
     *
     * @return text 
     */
    public function get_props()
    {
        return $this->props;
    }
}