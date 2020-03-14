<template>
  <v-app id="inspire">
    <v-navigation-drawer v-model="drawer" :clipped="$vuetify.breakpoint.lgAndUp" app>
      <v-list dense>
        <template v-for="item in items">
          <v-row v-if="item.heading" :key="item.heading" align="center">
            <v-col cols="6">
              <v-subheader v-if="item.heading">{{ item.heading }}</v-subheader>
            </v-col>
            <v-col cols="6" class="text-center">
              <a href="#!" class="body-2 black--text">EDIT</a>
            </v-col>
          </v-row>
          <v-list-group
            v-else-if="item.children"
            :key="item.text"
            v-model="item.model"
            :prepend-icon="item.model ? item.icon : item['icon-alt']"
            append-icon
          >
            <template v-slot:activator>
              <v-list-item-content>
                <v-list-item-title>{{ item.text }}</v-list-item-title>
              </v-list-item-content>
            </template>
            <v-list-item v-for="(child, i) in item.children" :key="i" :to="child.routeTo">
              <v-list-item-action v-if="child.icon">
                <v-icon>{{ child.icon }}</v-icon>
              </v-list-item-action>
              <v-list-item-content>
                <v-list-item-title>{{ child.text }}</v-list-item-title>
              </v-list-item-content>
            </v-list-item>
          </v-list-group>
          <v-list-item v-else :key="item.text" :to="item.routeTo">
            <v-list-item-action>
              <v-icon>{{ item.icon }}</v-icon>
            </v-list-item-action>
            <v-list-item-content>
              <v-list-item-title>{{ item.text }}</v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </template>
      </v-list>
    </v-navigation-drawer>
    <v-app-bar :clipped-left="$vuetify.breakpoint.lgAndUp" app color="blue darken-3" dark>
      <v-app-bar-nav-icon @click.stop="drawer = !drawer" />
      <v-toolbar-title style="width: 300px" class="ml-0 pl-4">
        <span class="hidden-sm-and-down">AIT HMS</span>
      </v-toolbar-title>

      <v-spacer />
      <v-btn icon>
        <v-icon>mdi-apps</v-icon>
      </v-btn>
      <v-btn icon>
        <v-icon>mdi-bell</v-icon>
      </v-btn>
    </v-app-bar>
    <v-content>
      <v-container class="fill-height" fluid>
        <v-layout>
          <v-flex>
            <router-view></router-view>
          </v-flex>
        </v-layout>
      </v-container>
    </v-content>
  </v-app>
</template>

<script>
import { mapState } from "vuex";
import store from "../store";
import NProgress from "nprogress";
NProgress.configure({ easing: "ease", speed: 500, showSpinner: false });
export default {
  name: "Admin",
  props: {
    source: String
  },
  data: () => ({
    drawer: null,
    items: [
      {
        icon: "mdi-view-dashboard",
        text: "Dashboard",
        routeTo: "/admin/"
      },
      {
        icon: "mdi-chevron-up",
        "icon-alt": "mdi-account-group",
        text: "Patients",
        model: false,
        children: [{ text: "Patients", routeTo: "/admin/Patients" }]
      },
      {
        icon: "mdi-calendar-multiple-check",
        text: "Appointement",
        routeTo: "/appointement"
      },
      {
        icon: "mdi-flask",
        text: "Labratory",
        routeTo: "/admin/labRequests"
      },
      {
        icon: "mdi-image-multiple",
        text: "Imaging",
        routeTo: "/admin/imagingRequests"
      },
      {
        icon: "mdi-pill",
        text: "Pharmacy",
        routeTo: "/admin/pharmacy/"
      },
      {
        icon: "mdi-bed-empty",
        text: "Ward",
        routeTo: "/admin/ward/"
      },
      {
        icon: "mdi-cash-multiple",
        text: "Billing",
        routeTo: "/admin/billing/"
      },
      {
        icon: "mdi-file-chart",
        text: "Report",
        routeTo: "/admin/report/"
      },
      {
        icon: "mdi-chevron-up",
        "icon-alt": "mdi-account-group",
        text: "Users and Account",
        model: false,
        children: [
          {
            icon: "mdi-account",
            text: "User",
            routeTo: "/admin/users"
          },
          {
            icon: "mdi-account-check",
            text: "Role",
            routeTo: "/admin/users/roles"
          },
          {
            icon: "mdi-account-key",
            text: "Permission",
            routeTo: "/admin/users/permissions"
          }
        ]
      },
      { icon: "mdi-settings", text: "Settings", routeTo: "/admin/settings" }
    ]
  }),
  created() {
    this.$store.watch(
      state => state.loading.loading,
      (newVal, oldVal) => {
        if (newVal === 0) return NProgress.done();
        if (oldVal === 0) return NProgress.start();
      }
    );
  }
};
</script>
<style>
#nprogress .bar {
  background: red !important;
  height: 4px;
}
</style>