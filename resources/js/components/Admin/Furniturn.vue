Skip to content Search or jump to… Pull requests Issues Marketplace Explore
@kkaarrdd vuetifyjs / vuetify 601 27.3k4.8k Code Issues 1.2k Pull requests 45
Discussions Actions Security Insights
vuetify/packages/docs/src/examples/data-tables/complex/crud.vue @phiter phiter
docs: add activator slot attrs to doc examples (#11394) … Latest commit c232556
on Jun 9 History 11 contributors
@johnleider@jacekkarczmarczyk@stefan-malcek@phiter@KaelWD@JHeimbach@ElijahKotyluk@dhonx@sh7dm@MajesticPotatoe@zhao-jessica
240 lines (229 sloc) 5.9 KB

<template>
    <v-data-table
        :headers="headers"
        :items="desserts"
        sort-by="calories"
        class="elevation-1"
    >
        <template v-slot:top>
            <v-toolbar flat color="white">
                <v-toolbar-title>เฟอร์นิเจอร์</v-toolbar-title>
                <v-divider class="mx-4" inset vertical></v-divider>
                <v-spacer></v-spacer>
                <v-dialog v-model="dialog" max-width="500px">
                    <template v-slot:activator="{ on, attrs }">
                        <v-btn
                            color="primary"
                            dark
                            class="mb-2"
                            v-bind="attrs"
                            v-on="on"
                            >เพิ่มรายการเฟอร์นิเจอร์</v-btn
                        >
                    </template>
                    <v-card>
                        <v-card-title>
                            <span class="headline">{{ formTitle }}</span>
                        </v-card-title>

                        <v-card-text>
                            <v-container>
                                <v-row>
                                    <v-col cols="12">
                                        <v-text-field
                                            v-model="editedItem.name"
                                            label="ชื่อรายการเฟอร์นิเจอร์"
                                        ></v-text-field>
                                    </v-col>
                                </v-row>
                            </v-container>
                        </v-card-text>

                        <v-card-actions>
                            <v-spacer></v-spacer>
                            <v-btn color="blue darken-1" text @click="close"
                                >ยกเลิก</v-btn
                            >
                            <v-btn color="blue darken-1" text @click="save"
                                >บันทึก</v-btn
                            >
                        </v-card-actions>
                    </v-card>
                </v-dialog>
            </v-toolbar>
        </template>

        <template v-slot:item.actions="{ item }">
            <v-icon small class="mr-2" @click="editItem(item)">
                mdi-pencil
            </v-icon>
            <v-icon small @click="deleteItem(item)">
                mdi-delete
            </v-icon>
        </template>
    </v-data-table>
</template>

<script>
export default {
    mounted() {
        this.initialize();
    },
    data: () => ({
        dialog: false,
        headers: [
            {
                text: "รายการเฟอร์นิเจอร์",
                align: "start",
                sortable: false,
                value: "name"
            },
            { text: "ดำเนินการ", value: "actions", sortable: false }
        ],
        desserts: [],
        editedIndex: -1,
        editedItem: {
            name: "",
            state: "1"
        },
        defaultItem: {
            name: "",
            state: "1"
        }
    }),
    computed: {
        formTitle() {
            return this.editedIndex === -1
                ? "เพิ่มรายการเฟอร์นิเจอร์"
                : "แก้ไขรายการเฟอร์นิเจอร์";
        }
    },
    watch: {
        dialog(val) {
            val || this.close();
        }
    },
    methods: {
        initialize() {
            axios.get("/api/furniture").then(response => {
                this.desserts = response.data.data;
            });
        },
        editItem(item) {
            console.log(item.id);
            this.editedIndex = this.desserts.indexOf(item);
            this.editedItem = Object.assign({}, item);
            this.dialog = true;
        },
        deleteItem(item) {
            console.log(item.id);
            this.$swal({
                title: "คุณแน่ใจไหม?",
                text: "คุณจะไม่สามารถเปลี่ยนกลับได้",
                icon: "warning",
                showCancelButton: true,
                cancelButtonColor: "#d33",
                cancelButtonText: "ยกเลิก",
                confirmButtonColor: "#3085d6",
                confirmButtonText: "ยืนยัน"
            }).then(result => {
                if (result.value) {
                    this.$swal("ลบแล้ว!", "ไฟล์ของคุณถูกลบ", "success");
                    axios
                        .delete("/api/furniture/" + item.id)
                        .then(response => {
                            this.initialize();
                        })
                        .catch(error => {
                            console.log(error);
                        });
                }
            });
        },
        close() {
            this.dialog = false;
            this.$nextTick(() => {
                this.editedItem = Object.assign({}, this.defaultItem);
                this.editedIndex = -1;
            });
        },
        save(item) {
            if (this.editedIndex > -1) {
                console.log(item.id);
                // axios
                //     .put("/api/furniture/" + item.id, {
                //         name: this.editedItem.name,
                //         state: this.editedItem.state
                //     })
                //     .then(response => {
                //         console.log(response);
                //         this.initialize();
                //     })
                //     .catch(error => {
                //         console.log(error);
                //     });
            } else {
                axios
                    .post("/api/furniture", {
                        name: this.editedItem.name,
                        state: this.editedItem.state
                    })
                    .then(response => {
                        this.initialize();
                    })
                    .catch(error => {
                        console.log(error);
                    });
            }
            this.close();
        }
    }
};
</script>
