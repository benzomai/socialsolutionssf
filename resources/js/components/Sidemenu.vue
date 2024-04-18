<script>
    export default {
        name: 'side-profile',
        props: ['authUser'],
        mounted() {
            console.log(this.authUser)
        }
    };
    
</script>

<template>
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="/admin/home">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-people"></i><span>Clients</span><i class="bi bi-chevron-down ms-auto"></i> 
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="components-alerts.html">
              <i class="bi bi-circle"></i><span>Alerts</span>
            </a>
          </li>
          <li>
            <a href="components-accordion.html">
              <i class="bi bi-circle"></i><span>Accordion</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link " href="/admin/users">
          <i class="bi bi-people"></i>
          <span>Users</span>
        </a>
      </li><!-- End User Nav -->

      <li class="nav-item">
        <a class="nav-link " href="/admin/smm">
          <i class="bi bi-people"></i>
          <span>Users</span>
        </a>
      </li><!-- End SMM Nav -->

    </ul>

  </aside><!-- End Sidebar-->
  </template>