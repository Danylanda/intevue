import { createRouter, createWebHistory } from 'vue-router';
import Dashboard from '../pages/master/Dashboard.vue';
import Reclutamiento from '../pages/Reclutamiento.vue';
import Profile from '../pages/Profile.vue';
import Principal from '../pages/Principal.vue';
import Login from '../pages/Login.vue';

const routes = [
  {
    name: 'Dashboard',
    path: '/',
    component: Dashboard,
    children: [
      { name: 'reclutamiento', path: '/reclutamiento', component: Reclutamiento }
    ]
  },
  { name: 'Profile',
   path: '/profile', 
   component: Profile
  },
  { name: 'Principal',
   path: '/principal', 
   component: Principal
  },
  { name: 'Login',
   path: '/login', 
   component: Login
  },
];

function Router() {
  const router = createRouter({
    history: createWebHistory(),
    routes,
  });
  return router;
}

const router = Router();
export default router;
