@extends('app')

@section('content')
    <div class="row" xmlns="http://www.w3.org/1999/html">

        <!-- left nav -->
        @include('layouts._leftnav');

        <!--right side navigation-->
        <div id="ticket-table" class="large-10 medium-9 columns">
            <h5 class="subheader"><a href="#">1234</a>[APW][Header] Redesign</h5>
            <div class="ticket-prop">
                <ul>
                    <li>Owner: <span><a href="">Roland Tacadena</a></span></li>
                    <li>Status: <span><a href="">assigned</a></span></li>
                    <li>Dev % complete: <span><a href="">80%</a></span></li>
                    <li>QA % complete: <span><a href="">80%</a></span></li>
                </ul>
            </div>
            <hr/>
            <div class="ticket-hist">
                <h5>Ticket History</h5>
                <div class="hist">
                    <ul>
                        <li>Changed owner to <i>rtacadena</i></li>
                        <li>Set dev % complete to <i>100%</i></li>
                    </ul>
                    <hr/>
                    <ul>
                        <li>Changed owner to <i>rtacadena</i></li>
                        <li>Set dev % complete to <i>100%</i></li>
                    </ul>
                    <hr/>
                    <ul>
                        <li>Changed owner to <i>rtacadena</i></li>
                        <li>Set dev % complete to <i>100%</i></li>
                    </ul>
                    <hr/>
                </div>
            </div>
            <div class="update-ticket">
                <div class="ticket-form">
                    <form>
                        <fieldset>
                            <legend>Create A New Ticket</legend>
                            <div class="row">
                                <div class="large-12 columns">
                                    <label>Ticket Title
                                        <input type="text" placeholder="large-12.columns" />
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-6 columns">
                                    <label>Ticket Description
                                        <textarea placeholder="small-12.columns"></textarea>
                                    </label>
                                </div>
                                <div class="large-6 columns">
                                    <label>Ticket Type:
                                        <select>
                                            <option value="husker">Bug</option>
                                            <option value="starbuck">Task</option>
                                            <option value="hotdog">Enhancement</option>
                                            <option value="apollo">User Story</option>
                                        </select>
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="large-3 columns">
                                    <label>Ticket Priority:
                                        <select>
                                            <option value="husker">High</option>
                                            <option value="starbuck">Medium</option>
                                            <option value="hotdog">Low</option>
                                        </select>
                                    </label>
                                </div>
                                <div class="large-3 columns">
                                    <label>Dev Assigned:
                                        <select>
                                            <option value="husker">rtacadena</option>
                                            <option value="starbuck">jorolfo</option>
                                            <option value="hotdog">jmontano</option>
                                            <option value="apollo">dstart</option>
                                        </select>
                                    </label>
                                </div>
                                <div class="large-3 columns">
                                    <label>Dev LOE
                                        <input type="text" placeholder="large-12.columns" />
                                    </label>
                                </div>
                                <div class="large-3 columns">
                                    <label>Baclog:
                                        <select>
                                            <option value="husker">APW</option>
                                            <option value="starbuck">JCW</option>
                                            <option value="hotdog">CP</option>
                                            <option value="apollo">PT</option>
                                        </select>
                                    </label>
                                </div>
                            </div>
                            <hr/>
                            <div class="row">
                                <div class="large-12 columns">
                                    <input class=" right button tiny" type="submit" name="ticket-action-submit" value="Create Ticket">
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
            <div class="form-ticket-comment">
                <form>
                    <fieldset>
                        <legend>Ticket Comment Form</legend>
                        <div class="row">
                            <div class="small-12 columns">
                                <label>Add Comment to this ticket
                                    <textarea placeholder="small-12.columns"></textarea>
                                </label>
                            </div>
                        </div>
                        <div class="row right">
                            <div class="small-12 columns">
                                <input id="comment-ticket-button" class="button tiny" type="submit" name="ticket-action-submit" value="Submit Changes">
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
            <div class="form-ticket-action">
                <form>
                    <fieldset>
                        <legend>Ticket Actions</legend>
                        <div class="row">
                            <!-- assign the current ticket to another user -->
                            <div class="large-6 columns">
                                <input type="radio" name="pokemon" value="Red" id="pokemonRed">
                                <label for="pokemonRed">Assign ticket to: </label>
                                <form action="">
                                    <input type="text" name="assign-ticket-to" placeholder="ex. rtacadena"/>
                                </form>
                                <span><i>The ticket will changed from <b>mfrancisco</b> to <b>rtacadena</b></i></span>
                            </div>
                        </div>
                        <hr/>
                        <div class="row">
                            <!--  -->
                            <div class="large-6 columns">
                                <input type="radio" name="pokemon" value="Red" id="pokemonBlue">
                                <label for="pokemonBlue">Submit for testing to:</label>
                                <form action="">
                                    <input type="text" name="testing-ticket-to" placeholder="ex. rtacadena"/>
                                </form>
                                <span><i>The ticket will changed from <b>mfrancisco</b> to <b>rtacadena</b></i></span>
                            </div>
                        </div>
                        <hr/>
                        <div class="row">
                            <!--  -->
                            <div class="large-6 columns">
                                <input type="radio" name="pokemon" value="Red" id="pokemonGreen">
                                <label for="pokemonGreen">Resolve ticket as: </label>
                                <form action="">
                                    <div class="large-12 columns">
                                        <label>Select actions
                                            <select>
                                                <option value="husker">fixed</option>
                                                <option value="starbuck">cannot replicate</option>
                                                <option value="hotdog">incomplete requirements</option>
                                                <option value="apollo">invalid</option>
                                            </select>
                                        </label>
                                    </div>
                                </form>
                                <span><i>The ticket will resolve as <b>closed</b></i></span>
                            </div>
                        </div>
                        <hr/>
                        <div class="row right">
                            <div class="large-6 columns">
                                <input class="button tiny" type="submit" name="ticket-action-submit" value="Submit Changes">
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection