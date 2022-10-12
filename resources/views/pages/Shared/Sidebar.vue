<template>
    <div>
        <div class="dash-nav dash-nav-dark">
            <header>
                <a href="#!" class="menu-toggle">
                    <i class="fas fa-bars"></i>
                </a>
                <a href="javascript:void(0)" class="spur-logo">
                    <i class="fas fa-bolt"></i>
                    <span>MBM Group</span>
                </a>
            </header>
            <nav class="dash-nav-list">
                <Link :href="baseURL+'/admin/dashboard'" class="dash-nav-item">
                    <i class="fas fa-home"></i> Dashboard 
                </Link>
                <Link :href="baseURL+'/admin/post'" class="dash-nav-item">
                    <i class="fas fa-ambulance"></i> Post Management
                </Link>
            </nav>
        </div>
    </div>
</template>

<script setup>

    const baseURL = window.baseURL;

    function toggleMenu(event){
        $(event.currentTarget).find('.dash-nav-dropdown-menu').toggle('show')
    }
</script>	