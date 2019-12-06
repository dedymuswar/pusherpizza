<template>
  <div id="app">
    <div class="progress" style="height: 20px;">
      <progressbar
        :now="progress"
        class="progress-bar progress-bar-striped bg-success progress-bar-animated"
        role="progressbar"
        label
      ></progressbar>
    </div>
    <br />
    <div class="col-md-6">
      <strong>Order Status :</strong>
      {{ statusNew}}
    </div>
    <img src="/img/giphy.gif" style="width:300px" alt="delivery" v-if="progress >= 100" />
  </div>
</template>

<script>
import { progressbar } from "vue-strap";
export default {
  components: {
    progressbar
  },
  props: ["status", "initial", "order_id"],
  data() {
    return {
      statusNew: this.status,
      progress: this.initial
    };
  },
  mounted() {
    Echo.private("pizza-tracker." + this.order_id).listen(
      "OrderStatusChanged",
      order => {
        // console.log(order);
        this.statusNew = order.status_name;
        this.progress = order.status_percent;
        // console.log("realtime pizza tracker bro");
      }
    );
  }
};
</script>
