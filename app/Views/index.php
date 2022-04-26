<div class="container">
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-login" type="button" role="tab" aria-controls="nav-login" aria-selected="true">Login</button>
            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-signup" type="button" role="tab" aria-controls="nav-signup" aria-selected="false">Signup</button>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-login" role="tabpanel" aria-labelledby="nav-login-tab">
            <form id="login-form" method="post" action="/login/public/index" class="needs-validation" novalidate>
                <?php if (session()->get('success')) { ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->get('success') ?>
                    </div>
                <?php
                }
                ?>
                <?php if (isset($validation)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $validation->listErrors() ?>
                    </div>
                <?php
                }
                ?>
                <div class="form-row">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input name="email" type="email" class="form-control" id="email" placeholder="Email" value="<?= set_value('email') ?>" required />
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" id="password" placeholder="Enter Password" required />
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary mt-1" type="submit">Log in</button>
            </form>
        </div>
        <div class="tab-pane fade" id="nav-signup" role="tabpanel" aria-labelledby="nav-signup-tab">
            <form id="signup-form" action="/login/public/signup" method="post" class="needs-validation" novalidate>
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label for="first-name" class="form-label">First name</label>
                        <input type="text" class="form-control" id="first-name" name="fname" placeholder="First name" value="<?= set_value('fname') ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="last-name" class="form-label">Last name</label>
                        <input type="text" class="form-control" id="last-name" name="lname" placeholder="Last name" value="<?= set_value('lname') ?>" required>

                    </div>
                </div>
                <div class="form-row">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?= set_value('email') ?>" required />
                    </div>
                </div>
                <div class="form-row">
                    <div class="mb-3">
                        <label for="validation1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="validation1" name="validation1" placeholder="Enter Password" required />
                    </div>
                </div>
                <div class="form-row">
                    <div class="mb-3">
                        <label for="validation2" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="validation2" name="validation2" oninput="validate_pw2(this)" placeholder="Re-Enter Password" required />
                        <div class="invalid-feedback">
                            Password's do not match!
                        </div>
                    </div>
                </div>
                <button id="btn2" class="btn btn-primary mt-1" type="submit">Sign Up</button>
            </form>
        </div>
    </div>
</div>