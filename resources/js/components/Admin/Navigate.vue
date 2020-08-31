<template>
  <v-app id="inspire">
    <v-navigation-drawer v-model="drawer" app>
      <v-list-item>
        <v-list-item-avatar>
          <v-img
            src="https://scontent.fbkk7-3.fna.fbcdn.net/v/t1.0-0/p640x640/40538933_1879739815668715_7515528156170682368_o.jpg?_nc_cat=101&_nc_sid=7aed08&_nc_ohc=Hsl08EPPJ4EAX9wjOYV&_nc_ht=scontent.fbkk7-3.fna&tp=6&oh=9001297d000568e7b23f22c4a8bb29dc&oe=5F7217CB"
          ></v-img>
        </v-list-item-avatar>
        <v-list-item-title class="title">กิตติธร เพ็งศรี</v-list-item-title>
      </v-list-item>

      <v-divider></v-divider>
      <v-list-item-group v-model="item" color="primary">
        <v-list>
          <router-link to="/">
            <v-list-item>
              <v-list-item-icon>
                <v-icon>mdi-home</v-icon>
              </v-list-item-icon>

              <v-list-item-title>หน้าแรก</v-list-item-title>
            </v-list-item>
          </router-link>

          <v-list-group prepend-icon="mdi-bed" value="true">
            <template v-slot:activator>
              <v-list-item-title>ห้องพัก</v-list-item-title>
            </template>

            <router-link to="/room" >
              <v-list-item>
                <v-list-item-icon></v-list-item-icon>
                <v-list-item-title>
                  <v-list-item-icon>
                    <v-icon>mdi-home-edit</v-icon>
                  </v-list-item-icon>ห้อง
                </v-list-item-title>
              </v-list-item>
            </router-link>

            <router-link to="/room/furniturn" >
              <v-list-item>
                <v-list-item-icon></v-list-item-icon>
                <v-list-item-title>
                  <v-list-item-icon>
                    <v-icon>mdi-sofa</v-icon>
                  </v-list-item-icon>เฟอร์นิเจอร์
                </v-list-item-title>
              </v-list-item>
            </router-link>
          </v-list-group>
        </v-list>
      </v-list-item-group>
    </v-navigation-drawer>

    <v-app-bar app color="indigo" dark>
      <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
      <v-toolbar-title>ลูกแก้วรีสอร์ท</v-toolbar-title>
    </v-app-bar>

    <v-main>
      <router-view></router-view>
    </v-main>
  </v-app>
</template>

<script>
export default {
  name: "App",
  props: {
    source: String,
  },
  data: () => ({
    drawer: null,
  }),
};
</script>

<style>
template{
    text-decoration: none !important;
}
</style>
