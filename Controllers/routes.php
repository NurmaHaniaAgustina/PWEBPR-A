<?php

// CONTACT
route('dashboard', 'get', 'ContactController::index');
route('dashboard/add-contact', 'post', 'ContactController::createContact');
route('dashboard/edit-contact', 'post', 'ContactController::updateContact');
route('dashboard/delete-contact', 'post', 'ContactController::deleteContact');

route('/', 'get', function () {
    echo ('Hello World!');
});