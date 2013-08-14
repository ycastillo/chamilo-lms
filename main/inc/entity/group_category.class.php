<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @license see /license.txt
 * @author autogenerated
 */
class GroupCategory extends \CourseEntity
{
    /**
     * @return \Entity\Repository\GroupCategoryRepository
     */
     public static function repository(){
        return \Entity\Repository\GroupCategoryRepository::instance();
    }

    /**
     * @return \Entity\GroupCategory
     */
     public static function create(){
        return new self();
    }

    /**
     * @var integer $c_id
     */
    protected $c_id;

    /**
     * @var integer $id
     */
    protected $id;

    /**
     * @var string $title
     */
    protected $title;

    /**
     * @var text $description
     */
    protected $description;

    /**
     * @var boolean $doc_state
     */
    protected $doc_state;

    /**
     * @var boolean $calendar_state
     */
    protected $calendar_state;

    /**
     * @var boolean $work_state
     */
    protected $work_state;

    /**
     * @var boolean $announcements_state
     */
    protected $announcements_state;

    /**
     * @var boolean $forum_state
     */
    protected $forum_state;

    /**
     * @var boolean $wiki_state
     */
    protected $wiki_state;

    /**
     * @var boolean $chat_state
     */
    protected $chat_state;

    /**
     * @var integer $max_student
     */
    protected $max_student;

    /**
     * @var boolean $self_reg_allowed
     */
    protected $self_reg_allowed;

    /**
     * @var boolean $self_unreg_allowed
     */
    protected $self_unreg_allowed;

    /**
     * @var integer $groups_per_user
     */
    protected $groups_per_user;

    /**
     * @var integer $display_order
     */
    protected $display_order;


    /**
     * Set c_id
     *
     * @param integer $value
     * @return GroupCategory
     */
    public function set_c_id($value)
    {
        $this->c_id = $value;
        return $this;
    }

    /**
     * Get c_id
     *
     * @return integer 
     */
    public function get_c_id()
    {
        return $this->c_id;
    }

    /**
     * Set id
     *
     * @param integer $value
     * @return GroupCategory
     */
    public function set_id($value)
    {
        $this->id = $value;
        return $this;
    }

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
     * Set title
     *
     * @param string $value
     * @return GroupCategory
     */
    public function set_title($value)
    {
        $this->title = $value;
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function get_title()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param text $value
     * @return GroupCategory
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
     * Set doc_state
     *
     * @param boolean $value
     * @return GroupCategory
     */
    public function set_doc_state($value)
    {
        $this->doc_state = $value;
        return $this;
    }

    /**
     * Get doc_state
     *
     * @return boolean 
     */
    public function get_doc_state()
    {
        return $this->doc_state;
    }

    /**
     * Set calendar_state
     *
     * @param boolean $value
     * @return GroupCategory
     */
    public function set_calendar_state($value)
    {
        $this->calendar_state = $value;
        return $this;
    }

    /**
     * Get calendar_state
     *
     * @return boolean 
     */
    public function get_calendar_state()
    {
        return $this->calendar_state;
    }

    /**
     * Set work_state
     *
     * @param boolean $value
     * @return GroupCategory
     */
    public function set_work_state($value)
    {
        $this->work_state = $value;
        return $this;
    }

    /**
     * Get work_state
     *
     * @return boolean 
     */
    public function get_work_state()
    {
        return $this->work_state;
    }

    /**
     * Set announcements_state
     *
     * @param boolean $value
     * @return GroupCategory
     */
    public function set_announcements_state($value)
    {
        $this->announcements_state = $value;
        return $this;
    }

    /**
     * Get announcements_state
     *
     * @return boolean 
     */
    public function get_announcements_state()
    {
        return $this->announcements_state;
    }

    /**
     * Set forum_state
     *
     * @param boolean $value
     * @return GroupCategory
     */
    public function set_forum_state($value)
    {
        $this->forum_state = $value;
        return $this;
    }

    /**
     * Get forum_state
     *
     * @return boolean 
     */
    public function get_forum_state()
    {
        return $this->forum_state;
    }

    /**
     * Set wiki_state
     *
     * @param boolean $value
     * @return GroupCategory
     */
    public function set_wiki_state($value)
    {
        $this->wiki_state = $value;
        return $this;
    }

    /**
     * Get wiki_state
     *
     * @return boolean 
     */
    public function get_wiki_state()
    {
        return $this->wiki_state;
    }

    /**
     * Set chat_state
     *
     * @param boolean $value
     * @return GroupCategory
     */
    public function set_chat_state($value)
    {
        $this->chat_state = $value;
        return $this;
    }

    /**
     * Get chat_state
     *
     * @return boolean 
     */
    public function get_chat_state()
    {
        return $this->chat_state;
    }

    /**
     * Set max_student
     *
     * @param integer $value
     * @return GroupCategory
     */
    public function set_max_student($value)
    {
        $this->max_student = $value;
        return $this;
    }

    /**
     * Get max_student
     *
     * @return integer 
     */
    public function get_max_student()
    {
        return $this->max_student;
    }

    /**
     * Set self_reg_allowed
     *
     * @param boolean $value
     * @return GroupCategory
     */
    public function set_self_reg_allowed($value)
    {
        $this->self_reg_allowed = $value;
        return $this;
    }

    /**
     * Get self_reg_allowed
     *
     * @return boolean 
     */
    public function get_self_reg_allowed()
    {
        return $this->self_reg_allowed;
    }

    /**
     * Set self_unreg_allowed
     *
     * @param boolean $value
     * @return GroupCategory
     */
    public function set_self_unreg_allowed($value)
    {
        $this->self_unreg_allowed = $value;
        return $this;
    }

    /**
     * Get self_unreg_allowed
     *
     * @return boolean 
     */
    public function get_self_unreg_allowed()
    {
        return $this->self_unreg_allowed;
    }

    /**
     * Set groups_per_user
     *
     * @param integer $value
     * @return GroupCategory
     */
    public function set_groups_per_user($value)
    {
        $this->groups_per_user = $value;
        return $this;
    }

    /**
     * Get groups_per_user
     *
     * @return integer 
     */
    public function get_groups_per_user()
    {
        return $this->groups_per_user;
    }

    /**
     * Set display_order
     *
     * @param integer $value
     * @return GroupCategory
     */
    public function set_display_order($value)
    {
        $this->display_order = $value;
        return $this;
    }

    /**
     * Get display_order
     *
     * @return integer 
     */
    public function get_display_order()
    {
        return $this->display_order;
    }
}