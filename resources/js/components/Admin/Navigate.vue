<template>
  <v-app id="inspire">
    <v-navigation-drawer v-model="drawer" app>
      <v-list-item>
        <v-list-item-avatar>
          <v-img
            src="https://scontent.fbkk11-1.fna.fbcdn.net/v/t1.0-9/106185946_2294436734199019_2399853570178858463_n.jpg?_nc_cat=107&_nc_sid=110474&_nc_eui2=AeFo-HYqG5rMBqnnT646A1lZKe_EUko67Esp78RSSjrsS9MvpSb417CXBMhSBO9vtFtOkOKlamJYK1MQGRajGDO9&_nc_ohc=pnPEjETWu0sAX9_8LlY&_nc_oc=AQmg9HVWeKYvMENJF-d2UfqiBPjNQdzWqwzGZ4S4NQTK0oent4Mzmqx2hqFGYDaTJb8&_nc_ht=scontent.fbkk11-1.fna&oh=4543db29f1cf6091b4c6493bd31be13a&oe=5F6861B8"
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
