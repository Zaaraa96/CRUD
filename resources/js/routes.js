import dashboard from './components/dashboard.vue';
import ExampleComponent from './components/ExampleComponent.vue';
import signin from './components/signin.vue';
import signout from './components/signout.vue';
export const routes=[
            {path: '/dashboard', component: dashboard},
            {path: '/add', component: ExampleComponent},
            {path: '/login', component:signin},
            {path: '/logout', component:signout},
          ];
