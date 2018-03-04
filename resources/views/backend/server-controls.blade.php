@extends('layouts.backend-layout')

@section('title')
    Server Control
@endsection

@section('content')

<section class="section container">
    <div class="columns is-multiline is-mobile">
        <div class="column is-half">
            <div class="block">
                <h1 class="title">Maintenance Mode</h1>

                <p>
                    Here you can put the website down for users. This is great for maintenance and updating stuff.
                </p>
            </div>

            <div class="block">
                <form action="/ssh/start-maintenance" method="post">
                    {{ csrf_field() }}

                    <button class="button is-danger" type="submit">
                        Start maintenance mode
                    </button>
                </form>

                <br>

                <form action="/ssh/stop-maintenance" method="post">
                    {{ csrf_field() }}

                    <button class="button is-success" type="submit">
                        Stop maintenance mode
                    </button>
                </form>
                
                <br>

                <form action="/ssh/reboot-server" method="post">
                    {{ csrf_field() }}

                    <button class="button is-danger" type="submit">
                        Reboot Server
                    </button>
                </form>
            </div>
        </div>

        <div class="column is-half">
            <div class="block">
                <h1 class="title">Cache</h1>

                <p>
                    This clears Laravel's cache. It's necessary after updating .env file.
                </p>
            </div>

            <div class="block">
                <form action="/ssh/cache-clear" method="post">
                    {{ csrf_field() }}

                    <button class="button is-info" type="submit">
                        Clear Artisan Cache
                    </button>
                </form>
                
                <br>
                
                <form action="/ssh/view-clear" method="post">
                    {{ csrf_field() }}

                    <button class="button is-danger" type="submit">
                        Clear Views
                    </button>
                </form>
                
                <br>
                
                <form action="/ssh/flush-all" method="post">
                    {{ csrf_field() }}

                    <button class="button is-warning" type="submit">
                        Clear Redis Cache
                    </button>
                </form>
                
                <br>
                
                <form action="/ssh/config-clear" method="post">
                    {{ csrf_field() }}

                    <button class="button is-success" type="submit">
                        Clear Config Cache
                    </button>
                </form>
                
                <br>
                
                <form action="/ssh/route-clear" method="post">
                    {{ csrf_field() }}

                    <button class="button is-info" type="submit">
                        Clear Routes Cache
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="section container">
    <div class="columns is-multiline is-mobile">
        <div class="column is-half">
            <div class="block">
                <h1 class="title">
                    Channel removal warnings
                </h1>

                <p>
                    Sends "ChannelRemovalWarning" email to inactive channels' moderators.
                </p>
            </div>

            <div class="block">
                <form action="/backend/channel-removal-warnings/send" method="post">
                    {{ csrf_field() }}

                    <button class="button is-danger" type="submit">
                        Send Emails
                    </button>
                </form>
            </div>
        </div>
        
        <div class="column is-half">
            <div class="block">
                <h1 class="title">Update comments count:</h1>

                <p>
                    Updates the count of comments per submissions. (useful in case a spammer screws with us)
                </p>
            </div>

            <div class="block">
                <form action="/backend/update-comments-count" method="post">
                    {{ csrf_field() }}

                    <button class="button is-info" type="submit">
                        Update Comments count
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
