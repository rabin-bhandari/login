<div class="container">
    <div class="card text-center">
        <div class="card-header">
            WELCOME USER!
        </div>
        <div class="card-body">
            <h5 class="card-title">Hi <?= session()->get('firstName') ?></h5>
            <p class="card-text">You've successfully logged in.</p>
            <p class="card-text">You do not have admin privileges.</p>
            <a href="/login/public/logout" class="btn btn-primary">Log Out</a>
        </div>
    </div>
</div>