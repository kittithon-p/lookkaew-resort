<template>
  <v-row justify="center">
    <v-dialog v-model="dialog" persistent max-width="600px">
      <template v-slot:activator="{ on, attrs }">
        <v-btn color="primary" dark v-bind="attrs" v-on="on">เพิ่มห้องพัก</v-btn>
      </template>
      <v-card>
        <v-card-title>
          <span class="headline">ลูกแก้วรีสอร์ท</span>
        </v-card-title>
        <v-card-text>
          <v-container>
            <v-row>
              <v-col cols="12">
                <v-text-field label="ชื่อหมายเลขห้องพัก" required></v-text-field>
              </v-col>
              <v-col cols="12" sm="6" md="4">
                <v-select :items="['1', '2', '3', '4']" label="จำนวนผู้เข้าพักมากสุด" required></v-select>
              </v-col>
              <v-col cols="12" sm="6" md="4">
                <v-text-field label="Legal middle name" hint="example of helper text only on focus"></v-text-field>
              </v-col>
              <v-col cols="12" sm="6" md="4">
                <v-text-field label="Legal last name" required></v-text-field>
              </v-col>
              <v-col cols="12" sm="4">
                <v-select :items="['200', '250', '300', '350']" label="ราคาต่อคืน" required></v-select>
              </v-col>
              <v-col cols="12" sm="4">
                <v-select :items="['200', '250', '300', '350']" label="ราคาชั่วคราว" required></v-select>
              </v-col>
              <v-col cols="12" sm="4">
                <v-select :items="['200', '250', '300', '350']" label="ราคาเพิ่มชั่วโมง" required></v-select>
              </v-col>
              <v-col cols="12">
                <v-autocomplete
                  v-model="model"
                  :items="items"
                  :search-input.sync="search"
                  hide-selected
                  dense
                  chips
                  small-chips
                  label="เฟอร์นิเจอร์"
                  multiple
                  required
                ></v-autocomplete>
              </v-col>
              <v-col cols="12">
                <v-file-input show-size counter multiple label="File input"></v-file-input>
              </v-col>
            </v-row>
          </v-container>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="blue darken-1" text @click="dialog = false">ยกเลิก</v-btn>
          <v-btn color="blue darken-1" text @click="dialog = false">บันทึก</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-row>
</template>

<script>
export default {
  data: () => ({
    dialog: false,
    items: ["Gaming", "Programming", "Vue", "Vuetify"],
    model: ["Vuetify"],
    search: null,
    value: null,
  }),
  watch: {
    model(val) {
      if (val.length > 5) {
        this.$nextTick(() => this.model.pop());
      }
    },
  },
};
</script>