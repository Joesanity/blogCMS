<table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Comment</th>
                            <th>Author</th>
                            <th>Email</th>
                            <th>In Response To</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Approve</th>
                            <th>Deny</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php getComments(); ?>
                    </tbody>
                </table>

<?php deleteComment(); ?>
<?php denyComment(); ?>
<?php approveComment(); ?>