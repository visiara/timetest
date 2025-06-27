<ul class="nav nav-tabs mb-3">
    <li class="nav-item">
        <a href='adminusers.php' class="nav-link text-muted <?php if ($thepagename == 'adminusers.php') {
                                                                echo $activePage;
                                                            } ?>" href="#">Admin User</a>
    </li>
    <li class="nav-item">
        <a href='deviceadmins.php' class="nav-link text-muted <?php if ($thepagename == 'deviceadmins.php') {
                                                                    echo $activePage;
                                                                } ?>" href="#">Device User</a>
    </li>
    <li class="nav-item">
        <a href='' class="nav-link text-muted" href="#">Admin Settings</a>
    </li>
</ul>