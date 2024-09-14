<?php
$user = get_user();
?>
<aside class="sidebar">
            <a href="https://dnjy.ir/php" class="panel-logo align-center">
                <img src="images/logo-light.svg" class="login-logo" alt="Daneshjooyar" width="145" height="59">
            </a>
            <div class="profile align-center">
                <img src="<?php echo $user['avatar'];?>" alt="<?php echo $user['name'];?>" width="256" height="256">
                <p class="user-full-name">
                    <?php echo $user['name'];?>
                </p>
                <p class="user-phone">
                    <?php echo $user['phone'];?>
                </p>
            </div>
            <nav class="menu">
                <a href="index.php" <?php echo $page_name == 'dashboard' ? 'class="active"' : '';?>>
                    <svg xmlns="http://www.w3.org/2000/svg" width="21.5" height="20.969" viewBox="0 0 21.5 20.969">
                        <g id="house" transform="translate(-1.25 -1.781)">
                            <path id="Path_60" data-name="Path 60" d="M22,22.75H2a.75.75,0,0,1,0-1.5H22a.75.75,0,0,1,0,1.5Z" fill="#fff"/>
                            <path id="Path_61" data-name="Path 61" d="M21,22.75a.75.75,0,0,1-.75-.75V9.97a1.239,1.239,0,0,0-.48-.987l-7-5.44a1.261,1.261,0,0,0-1.539,0l-7,5.448a1.268,1.268,0,0,0-.484.98.75.75,0,1,1-1.5,0A2.78,2.78,0,0,1,3.3,7.812l0,0,7-5.45a2.763,2.763,0,0,1,3.377,0l7,5.443A2.729,2.729,0,0,1,21.75,9.97V22A.75.75,0,0,1,21,22.75Z" fill="#fff"/>
                            <path id="Path_62" data-name="Path 62" d="M2.949,22.75h0A.75.75,0,0,1,2.2,22l.03-7.97a.75.75,0,1,1,1.5.006L3.7,22A.75.75,0,0,1,2.949,22.75Z" fill="#fff"/>
                            <path id="Path_63" data-name="Path 63" d="M11,16.25h2a2.253,2.253,0,0,1,2.25,2.25V22a.75.75,0,0,1-.75.75h-5A.75.75,0,0,1,8.75,22V18.5A2.253,2.253,0,0,1,11,16.25Zm2.75,5V18.5a.751.751,0,0,0-.75-.75H11a.751.751,0,0,0-.75.75v2.75Z" fill="#fff"/>
                            <path id="Path_64" data-name="Path 64" d="M9.5,14.5h-2a1.752,1.752,0,0,1-1.75-1.75v-1.5A1.752,1.752,0,0,1,7.5,9.5h2a1.752,1.752,0,0,1,1.75,1.75v1.5A1.752,1.752,0,0,1,9.5,14.5ZM7.5,11a.253.253,0,0,0-.25.25v1.5A.253.253,0,0,0,7.5,13h2a.253.253,0,0,0,.25-.25v-1.5A.253.253,0,0,0,9.5,11Z" fill="#fff"/>
                            <path id="Path_65" data-name="Path 65" d="M16.5,14.5h-2a1.752,1.752,0,0,1-1.75-1.75v-1.5A1.752,1.752,0,0,1,14.5,9.5h2a1.752,1.752,0,0,1,1.75,1.75v1.5A1.752,1.752,0,0,1,16.5,14.5Zm-2-3.5a.253.253,0,0,0-.25.25v1.5a.253.253,0,0,0,.25.25h2a.253.253,0,0,0,.25-.25v-1.5A.253.253,0,0,0,16.5,11Z" fill="#fff"/>
                            <path id="Path_66" data-name="Path 66" d="M19,7.75a.75.75,0,0,1-.75-.742L18.228,4.75H14.57a.75.75,0,0,1,0-1.5h4.4a.75.75,0,0,1,.75.743l.03,3a.75.75,0,0,1-.742.757Z" fill="#fff"/>
                        </g>
                    </svg>
                    پیشخوان
                </a>
                <a href="tasklist.php" <?php echo $page_name == 'tasklist' ? 'class="active"' : '';?>>
                    <svg xmlns="http://www.w3.org/2000/svg" width="19.5" height="18.5" viewBox="0 0 19.5 18.5">
                        <g id="task" transform="translate(-2.25 -2.75)">
                            <path id="Path_67" data-name="Path 67" d="M21,20.25H11a.75.75,0,0,1,0-1.5H21a.75.75,0,0,1,0,1.5Z" fill="#fff"/>
                            <path id="Path_68" data-name="Path 68" d="M21,13.25H20a.75.75,0,0,1,0-1.5h1a.75.75,0,0,1,0,1.5Z" fill="#fff"/>
                            <path id="Path_69" data-name="Path 69" d="M16.49,13.25H11a.75.75,0,0,1,0-1.5h5.49a.75.75,0,0,1,0,1.5Z" fill="#fff"/>
                            <path id="Path_70" data-name="Path 70" d="M21,6.25H11a.75.75,0,0,1,0-1.5H21a.75.75,0,0,1,0,1.5Z" fill="#fff"/>
                            <path id="Path_71" data-name="Path 71" d="M4,7.25a.748.748,0,0,1-.53-.22l-1-1A.75.75,0,0,1,3.53,4.97l.47.47L6.47,2.97A.75.75,0,0,1,7.53,4.03l-3,3A.748.748,0,0,1,4,7.25Z" fill="#fff"/>
                            <path id="Path_72" data-name="Path 72" d="M4,14.25a.748.748,0,0,1-.53-.22l-1-1A.75.75,0,0,1,3.53,11.97l.47.47L6.47,9.97A.75.75,0,1,1,7.53,11.03l-3,3A.748.748,0,0,1,4,14.25Z" fill="#fff"/>
                            <path id="Path_73" data-name="Path 73" d="M4,21.25a.748.748,0,0,1-.53-.22l-1-1A.75.75,0,1,1,3.53,18.97l.47.47,2.47-2.47A.75.75,0,0,1,7.53,18.03l-3,3A.748.748,0,0,1,4,21.25Z" fill="#fff"/>
                        </g>
                    </svg>
                    لیست وظایف
                </a>
                <a href="login.php?action=logout" onclick="return confirm('برای خروج مطمئنید؟');">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20.5" height="20.53" viewBox="0 0 20.5 20.53">
                        <g id="logout" transform="translate(-1.75 -1.74)">
                            <path id="Path_77" data-name="Path 77" d="M15.24,22.27h-.13a7.638,7.638,0,0,1-4.952-1.332A5.929,5.929,0,0,1,8.163,16.6a.75.75,0,0,1,1.494-.139,4.481,4.481,0,0,0,1.438,3.306,6.375,6.375,0,0,0,4.015,1h.13c2.075,0,3.434-.392,4.276-1.234s1.234-2.2,1.234-4.276V13a.75.75,0,1,1,1.5,0v2.26c0,2.5-.532,4.195-1.673,5.337S17.739,22.27,15.24,22.27Z" fill="#fff"/>
                            <path id="Path_78" data-name="Path 78" d="M21.5,9.5a.75.75,0,0,1-.75-.75c0-2.075-.392-3.434-1.234-4.276S17.316,3.24,15.24,3.24h-.13a6.346,6.346,0,0,0-4.035,1.017A4.551,4.551,0,0,0,9.648,7.624.75.75,0,0,1,8.153,7.5C8.5,3.515,10.642,1.74,15.11,1.74h.13c2.5,0,4.195.532,5.337,1.673S22.25,6.251,22.25,8.75A.75.75,0,0,1,21.5,9.5Z" fill="#fff"/>
                            <path id="Path_79" data-name="Path 79" d="M15,12.75H3.619a.75.75,0,0,1,0-1.5H15a.75.75,0,1,1,0,1.5Z" fill="#fff"/>
                            <path id="Path_80" data-name="Path 80" d="M5.85,16.1a.748.748,0,0,1-.53-.22L1.97,12.53a.75.75,0,0,1,0-1.061L5.32,8.12A.75.75,0,0,1,6.38,9.18L3.561,12l2.82,2.82a.75.75,0,0,1-.53,1.28Z" fill="#fff"/>
                        </g>
                    </svg>
                    خروج از حساب کاربری
                </a>
            </nav><!--.menu-->
        </aside><!--.sidebar-->