<template>
    <div class="text-center">
        <v-btn rounded color="primary" dark @click="showAlert"
            >Hello world</v-btn
        >
    </div>
</template>

<script>
export default {
    methods: {
        showAlert() {
            // Use sweetalert2
            this.$swal({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then(result => {
                if (result.value) {
                     this.$swal(
                        "Deleted!",
                        "Your file has been deleted.",
                        "success"
                    );
                }
            });
        }
    }
};
</script>
