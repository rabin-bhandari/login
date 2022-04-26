<div class="admin-container">
    <div class="card text-center">
        <div class="card-header">
            Hello <?= session()->get('firstName') ?>! <span class="wave">👋</span>


        </div>
        <div class="card-body">

            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    use App\Models\UserModel;

                    $model = new UserModel();

                    $users = $model->findAll();


                    foreach ($users as $user) :
                        $id = $user['id'];
                        $first_name = $user['first_name'];
                        $last_name = $user['last_name'];
                        $email = $user['email'];
                        $admin = $user['admin'];

                    ?>
                        <tr>
                            <th scope="row"><?php echo $id; ?></th>
                            <td><?php echo $first_name; ?></td>
                            <td><?php echo $last_name; ?></td>
                            <td><?php echo $email; ?></td>
                            <td><?php echo ($admin == 1) ? 'admin' : 'user'; ?></td>
                            <td>
                                <!-- Button trigger modal -->
                                <button class="btn btn-danger btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#ModalCenter<?php echo $id; ?>"><i class="fa fa-pencil"></i></button>

                                <!-- Modal -->
                                <div class="modal fade" id="ModalCenter<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="ModalCenterTitle">Edit User</b></h5>
                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="edit-form" method="post" action="/login/public/updateUser" class="needs-validation" novalidate>
                                                    <div class="row g-3 mb-3">
                                                        <div class="col-md-6">
                                                            <label for="first-name" class="form-label">First name</label>
                                                            <input type="text" class="form-control" id="first-name" placeholder="<?php echo $first_name; ?>" disabled>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="last-name" class="form-label">Last name</label>
                                                            <input type="text" class="form-control" id="last-name" placeholder="<?php echo $last_name; ?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="row g-3 mb-3">
                                                        <div class="col-md-7">
                                                            <label for="email" class="form-label">Email</label>
                                                            <input type="email" class="form-control" id="email" placeholder="<?php echo $email; ?>" disabled />
                                                        </div>
                                                        <div class="col-md-5 mb-3">
                                                            <label for="role" class="form-label">Role</label>
                                                            <select class="form-select" name="role" id="role" aria-describedby="validationServer04Feedback" required>
                                                                <option selected value="<?php echo $admin; ?>"><?php echo ($admin == 1) ? 'Admin' : 'User'; ?></option>
                                                                <option value="<?php echo ($admin == 1) ? 0 : 1; ?>"><?php echo ($admin == 0) ? 'Admin' : 'User'; ?></option>
                                                            </select>
                                                        </div>

                                                    </div>
                                                    <hr />
                                                    <div class="form-row">
                                                        <p>Set New Password</p>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="mb-3">
                                                            <label for="newPass" class="form-label">Password</label>
                                                            <input type="password" class="form-control" name="newPass" id="<?php echo $id ?>pass1" placeholder=" Enter Password" required />
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="mb-3">
                                                            <label for="newPass2" class="form-label">Confirm Password</label>
                                                            <input type="password" class="form-control" name="newPass2" id="<?php echo $id ?>pass" oninput="validate_edit_pw2(this)" placeholder="Re-Enter Password" required />
                                                            <div class="invalid-feedback">
                                                                Password's do not match!
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
                                                    <?php session()->set('updateId', $id); ?>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>

                                                </form>
                                                <div class="modal-footer">
                                                    <form class="pt-0 pb-0 pr-0" method="post" action="edit_user_delete.php">
                                                        <input type="hidden" id="delete_id" name="delete_id" value="<?php echo $id; ?>">
                                                        <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Delete Account</button>
                                                    </form>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <a href="/login/public/logout" class="btn btn-primary">Log Out</a>
        </div>
    </div>
</div>