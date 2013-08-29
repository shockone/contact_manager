<?php



class ContactsController extends ApplicationController {
    function index() {
        $this->contacts = Contact::loadAll();
        $this->_view->render('contacts', 'index');
    }

    function create() {
        $contact = new Contact($this->_params);
        $contact->save();
        $this->redirect('contacts', 'index');
    }

    function edit() {
        echo Contact::loadJSON($this->_params['id']);
    }

    function update() {
        $this->create();
    }

    function delete() {
        Contact::remove($this->_params['id']);
        $this->redirect('contacts', 'index');
    }
}