<?php

class TM_Testimonials_Block_Adminhtml_Editor extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
        $this->_blockGroup      = 'testimonials';
        $this->_controller      = 'adminhtml';
        $this->_mode            = 'editor';
        $this->_updateButton('save', 'label', Mage::helper('testimonials')->__("Submit Form"));
        
        /*use the following code if you need saveAndContinueEdit button

        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('atwix_editor')->__('Save and Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";*/
    }

    public function getHeaderText()
    {
       return Mage::helper('testimonials')->__("WYSIWYG editor form");
    }

    /**
     * Get form save URL
     *
     * @deprecated
     * @see getFormActionUrl()
     * @return string
     */
    public function getSaveUrl()
    {
        $this->setData('form_action_url', 'save');
        return $this->getFormActionUrl();
    }
}
