<template>
  <alert v-model="showAlert" placement="top-right" duration="4000" type="success" width="300px">
    <span class="icon-ok-circled alert-icon-float-left"></span>
    <strong>Order status updated !</strong>
    <p>Order ID: {{order_id}} has been updated.</p>
  </alert>
</template>

<script>
// import { alert } from "vue-strap";
import { alert } from "vue-strap";
export default {
  components: {
    alert
  },
  props: ["user_id"],
  data() {
    return {
      showAlert: false,
      order_id: ""
    };
  },
  mounted() {
    Echo.channel("pizza-tracker").listen("OrderStatusChanged", order => {
      if ((this.user_id = order.user_id)) {
        this.showAlert = true;
        this.order_id = order.id;
      }
    });
  }
};
</script>
