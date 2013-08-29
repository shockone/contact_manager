<div id="container">
    <div id="contacts-list">
        <div class="menu">
            <div class='popbox'>
                <span class="button add-button open">Add new contact</span>
                <div class='collapse'>
                    <div class="box-wrapper">
                        <div class='box'>
                            <div class='arrow'></div>
                            <div class='arrow-border'></div>
                            <form name="new_contact_form" action="/contacts/create" method="post">
                                <?php require '_form.php'; ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class='popbox'>
                <div class="button edit-button open">Edit contact</div>
                <div class='collapse'>
                    <div class="box-wrapper">
                        <div class='box edit-box'>
                            <div class='arrow'></div>
                            <div class='arrow-border'></div>
                            <form name="edit_contact_form" action="/contacts/update" method="post">
                                <?php require '_form.php'; ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <span class="button delete-button open">Delete</span>
            <input class="search" placeholder="Search contacts"/>
            <span class="sort-by">
                <span id="sort-by-text">Sort by:</span>
                <span class="sort button" data-sort="name">First Name</span>
                <span class="sort button" data-sort="category">Last Name</span>
            </span>
        </div>
        <ul class="list">
            <?php foreach ($this->controller->contacts as $contact): ?>
                <li id=<?php echo $contact->getId(); ?>>
                    <h4>
                        <!--TODO: avoid code duplication-->
                    <span class="phones">
                        <div class="cell-phone">
                            <?php $phone = $contact->getCellPhone();
                            if ($phone) echo '<p>Cell phone:</p>' . $phone; ?>
                        </div>
                        <div class="home-phone">
                            <?php $phone = $contact->getHomePhone();
                            if ($phone) echo '<p>Home phone:</p>' . $phone; ?>
                        </div>
                        <div class="work-phone">
                            <?php $phone = $contact->getWorkPhone();
                            if ($phone) echo '<p>Work phone:</p>' . $phone; ?>
                        </div>
                    </span>
                    <span class="first-name">
                        <?php echo $contact->getFirstName(); ?>
                    </span>
                    <span class="last-name">
                        <?php echo $contact->getLastName(); ?>
                    </span>
                    <span class="birth-date">
                        <?php echo $contact->getBirthDate(); ?>
                    </span>
                        <div class="email">
                            <?php echo $contact->getEmail(); ?>
                        </div>
                        <div class="addresses">
                            <?php
                            if ($contact->getAddress()) {
                                echo '<p>' . join(', ', array_filter(array(
                                        $contact->getCountry(),
                                        $contact->getState(),
                                        $contact->getZip(),
                                        $contact->getCity(),
                                        $contact->getAddress()
                                    ))) . '</p>';
                            }
                            if ($contact->getSecondAddress()) {
                                echo '<p>' . join(', ', array_filter(array(
                                        $contact->getSecondCountry(),
                                        $contact->getSecondState(),
                                        $contact->getSecondZip(),
                                        $contact->getSecondCity(),
                                        $contact->getSecondAddress()
                                    ))) . '</p>';
                            }
                            ?>
                        </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>