<table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Username</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Role</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php getUsers(); ?>
                    </tbody>
                </table>

<?php deleteUser(); ?>
<?php denyUser(); ?>
<?php approveUser(); ?>