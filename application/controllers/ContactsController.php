<?php

class ContactsController extends ApplicationController {
    function index() {
        $this->_contacts = Contact::loadAll();
        $this->_view->render('contacts', 'index');
    }

    function create() {
        var_export($this->_params);
//        $contact = new Contact($this->_params);
//        $contact->save();
//        $this->_view->render('contacts', 'create');
    }
}