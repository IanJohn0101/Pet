<div class = "scroll" id ="bodyright">
    <h3>View All Users</h3>
    <form method = "POST" enctype = "multipart/form-data">
    <table>
        <tr>
            <th>User Name</th>
            <th>User Email</th>
            <th>Contact Info</th>
            <th>Municipality</th>
            <th>Barangay</th>
            <th>Delete</th>
        </tr>
        <tr>
            <?php
                echo viewall_users();
            ?>
        </tr>
        </table>
    </form>
</div>



