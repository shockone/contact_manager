<div id="container">
    <div id="contacts-list">
        <div class="menu">
            <div class='popbox'>
                <span class="button add-button open">Add new contact</span>

                <div class='collapse'>
                    <div class='box'>
                        <div class='arrow'></div>
                        <div class='arrow-border'></div>
                        <form name="new_contact_form" action="/contacts/create" method="post">
                            <div class="column">
                                <p>First name*</p>
                                <input type="text" size="35" name="first_name"/>
                                <p>Last name*</p>
                                <input type="text" size="35" name="last_name"/>
                                <p>Email*</p>
                                <input type="text" size="35" name="email"/>
                                <p>Birth date</p>
                                <input type="text" size="35" name="birth_date"/>
                                <p>Cell phone</p>
                                <input type="text" size="35" name="cell_phone"/>
                                <p>Home phone</p>
                                <input type="text" size="35" name="home_phone"/>
                                <p>Work phone</p>
                                <input type="text" size="35" name="work_phone"/>
                            </div>
                            <div class="column">
                                <p>Address</p>
                                <input type="text" size="35" name="address"/>
                                <p>City</p>
                                <input type="text" size="35" name="city"/>
                                <p>State</p>
                                <input type="text" size="35" name="state"/>
                                <p>Country</p>
                                <input type="text" size="35" name="country"/>
                                <p>ZIP</p>
                                <input type="text" size="35" name="zip"/>

                                <br/>
                                <p id="show-second-address">Add another address</p>
                                <br/>
                                <div id="second-address" style="display: none">
                                    <p>Second address</p>
                                    <input type="text" size="35" name="second_address"/>
                                    <p>City</p>
                                    <input type="text" size="35" name="second_city"/>
                                    <p>State</p>
                                    <input type="text" size="35" name="second_state"/>
                                    <p>Country</p>
                                    <input type="text" size="35" name="second_country"/>
                                    <p>ZIP</p>
                                    <input type="text" size="35" name="second_zip"/>
                                </div>
                                <span class="button" onclick="document.new_contact_form.submit()">Save</span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <input class="search" placeholder="Search contacts"/>
            <span class="sort-by">
                <span id="sort-by-text">Sort by:</span>
                <span class="sort button" data-sort="name">First Name</span>
                <span class="sort button" data-sort="category">Last Name</span>
            </span>
        </div>
        <ul class="list">
            <?php foreach($this->controller->contacts as $contact): ?>

            <li>
                <h4>
                    <!--TODO: avoid code duplication-->
                    <span class="phones">
                        <div class="cell-phone">
                            <?php $phone = $contact->getCellPhone(); if($phone) echo '<p>Cell phone:</p>' . $phone; ?>
                        </div>
                        <div class="home-phone">
                            <?php $phone = $contact->getHomePhone(); if($phone) echo '<p>Home phone:</p>' . $phone; ?>
                        </div>
                        <div class="work-phone">
                            <?php $phone = $contact->getWorkPhone(); if($phone) echo '<p>Work phone:</p>' . $phone; ?>
                        </div>
                    </span>

                    <span class="name">
                        <?php  echo $contact->getFirstName() . ' ' . $contact->getLastName();?>
                    </span>
                    <div class="email">
                        <?php  echo $contact->getEmail();?>
                    </div>

                    <div class="addresses">
                        <?php
                        if($contact->getAddress()){
                            echo '<p>' . join(', ', array_filter(array(
                                    $contact->getCountry(),
                                    $contact->getState(),
                                    $contact->getZip(),
                                    $contact->getCity(),
                                    $contact->getAddress()
                                ))) . '</p>';
                        }
                        if($contact->getSecondAddress()){
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

                    <span class="category"></span>



                </h4>
                <p class="description"></p>
            </li>
            <?php endforeach; ?>
            <li>
                <h4><span class="name">Good Coffee</span> <span class="category">Beverage</span></h4>
                <p class="description">Coffee is a brewed beverage with a dark, slightly acidic flavor
                    prepared from the roasted seeds of the coffee plant, colloquially called coffee
                    beans.</p>
            </li>
            <li>
                <h4><span class="name">Full Throttle</span> <span class="category">Game</span></h4>
                <p class="description">Full Throttle is a computer adventure game developed and published by
                    LucasArts. It was designed by Tim Schafer, who would later go on to design the
                    critically acclaimed titles Grim Fandango, Psychonauts and Brütal Legend.</p>
            </li>
            <li>
                <h4><span class="name">Brooklyn Lager</span> <span class="category">Beverage</span></h4>

                <p class="description">Brooklyn Brewery was started in 1987 by former Associated Press
                    correspondent Steve Hindy and former Chemical Bank lending officer Tom Potter.</p>
            </li>
            <li>
                <h4><span class="name">Monkey Island 2: LeChuck's Revenge</span> <span
                        class="category">Game</span>
                </h4>
                <p class="description">Monkey Island 2: LeChuck's Revenge is an adventure game developed and
                    published by LucasArts in 1991. It was the second game of the Monkey Island series,
                    following The Secret...</p>
            </li>
            <li>
                <h4><span class="name">Good Coffee</span> <span class="category">Beverage</span></h4>
                <p class="description">Coffee is a brewed beverage with a dark, slightly acidic flavor
                    prepared from the roasted seeds of the coffee plant, colloquially called coffee
                    beans.</p>
            </li>
            <li>
                <h4><span class="name">Full Throttle</span> <span class="category">Game</span></h4>
                <p class="description">Full Throttle is a computer adventure game developed and published by
                    LucasArts. It was designed by Tim Schafer, who would later go on to design the
                    critically acclaimed titles Grim Fandango, Psychonauts and Brütal Legend.</p>
            </li>
            <li>
                <h4><span class="name">Brooklyn Lager</span> <span class="category">Beverage</span></h4>

                <p class="description">Brooklyn Brewery was started in 1987 by former Associated Press
                    correspondent Steve Hindy and former Chemical Bank lending officer Tom Potter.</p>
            </li>
            <li>
                <h4><span class="name">Monkey Island 2: LeChuck's Revenge</span> <span
                        class="category">Game</span>
                </h4>
                <p class="description">Monkey Island 2: LeChuck's Revenge is an adventure game developed and
                    published by LucasArts in 1991. It was the second game of the Monkey Island series,
                    following The Secret...</p>
            </li>
            <li>
                <h4><span class="name">Good Coffee</span> <span class="category">Beverage</span></h4>
                <p class="description">Coffee is a brewed beverage with a dark, slightly acidic flavor
                    prepared from the roasted seeds of the coffee plant, colloquially called coffee
                    beans.</p>
            </li>
            <li>
                <h4><span class="name">Full Throttle</span> <span class="category">Game</span></h4>
                <p class="description">Full Throttle is a computer adventure game developed and published by
                    LucasArts. It was designed by Tim Schafer, who would later go on to design the
                    critically acclaimed titles Grim Fandango, Psychonauts and Brütal Legend.</p>
            </li>
            <li>
                <h4><span class="name">Brooklyn Lager</span> <span class="category">Beverage</span></h4>

                <p class="description">Brooklyn Brewery was started in 1987 by former Associated Press
                    correspondent Steve Hindy and former Chemical Bank lending officer Tom Potter.</p>
            </li>
            <li>
                <h4><span class="name">Monkey Island 2: LeChuck's Revenge</span> <span
                        class="category">Game</span>
                </h4>
                <p class="description">Monkey Island 2: LeChuck's Revenge is an adventure game developed and
                    published by LucasArts in 1991. It was the second game of the Monkey Island series,
                    following The Secret...</p>
            </li>
            <li>
                <h4><span class="name">Good Coffee</span> <span class="category">Beverage</span></h4>
                <p class="description">Coffee is a brewed beverage with a dark, slightly acidic flavor
                    prepared from the roasted seeds of the coffee plant, colloquially called coffee
                    beans.</p>
            </li>
            <li>
                <h4><span class="name">Full Throttle</span> <span class="category">Game</span></h4>
                <p class="description">Full Throttle is a computer adventure game developed and published by
                    LucasArts. It was designed by Tim Schafer, who would later go on to design the
                    critically acclaimed titles Grim Fandango, Psychonauts and Brütal Legend.</p>
            </li>
            <li>
                <h4><span class="name">Brooklyn Lager</span> <span class="category">Beverage</span></h4>

                <p class="description">Brooklyn Brewery was started in 1987 by former Associated Press
                    correspondent Steve Hindy and former Chemical Bank lending officer Tom Potter.</p>
            </li>
        </ul>
    </div>
</div>