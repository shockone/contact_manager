<?php

class ContactsController extends ApplicationController {
    function index() {
        $this->_view->render('contacts', 'index');
    }

    function create() {
        $contact = new Contact($this->_params);
        $contact->save();
        $this->_view->render('contacts', 'create');
    }
}