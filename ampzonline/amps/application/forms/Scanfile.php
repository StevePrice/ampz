<?php
class Application_Form_Scanfile extends Zend_Form
{

    public function init()
    {
    	// Dojo-enable the form:
        Zend_Dojo::enableForm($this);
 
        // Set the method for the display form to POST
        $this->setMethod('post');

        // Add an email element
        $this->addElement('file', 'infile', array(
            'label'      => 'Select File to Scan:',
            'required'   => true,
            'filters'    => array('StringTrim'),
            
            )
        );

        // Add the comment element
        $this->addElement('textarea', 'comment', array(
            'label'      => 'Please Comment:',
            'required'   => true,
            'validators' => array(
                array('validator' => 'StringLength', 'options' => array(0, 20))
                )
        ));

        // Add a captcha
        $this->addElement('captcha', 'captcha', array(
            'label'      => 'Please enter the 5 letters displayed below:',
            'required'   => true,
            'captcha'    => array(
                'captcha' => 'Figlet',
                'wordLen' => 5,
                'timeout' => 300
            )
        ));

        // Add the submit button
        $this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'Scan  File',
        ));

        // And finally add some CSRF protection
        $this->addElement('hash', 'csrf', array(
            'ignore' => true,
        ));
    }
}
