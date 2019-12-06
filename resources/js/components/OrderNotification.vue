<template>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle no-caret" href="#" role="button" data-toggle="dropdown">
      <i class="fa fa-bell"></i>
      <span class="badge badge-danger-nav" v-if="notifications.length > 0">{{notifications.length}}</span>
      <span class="caret" style="margin-left:-10px"></span>
    </a>
    <div
      class="dropdown-menu dropdown-menu-right"
      style="width:400px"
      data-dropdown-in="fadeIn"
      data-dropdown-out="fadeOut"
    >
      <div class="notifications-nicescroll-bar">
        <a
          :href="notification.url"
          class="dropdown-item"
          v-for="notification in notifications"
          :key="notification"
        >
          <div class="media">
            <div class="media-body">
              <i class="fa fa-exclamation-circle fa-fw"></i>
              {{notification.description}}
              <span class="pull-right text-muted small">
                <timeago :datetime="notification.time" :auto-update="60"></timeago>
              </span>
            </div>
          </div>
          <div class="dropdown-divider"></div>
        </a>
        <a href="#" v-if="notifications.length > 0">
          <div class="media">
            <div class="media-body text-center">
              <span class>
                <strong>See all Alerts</strong>
              </span>
            </div>
          </div>
        </a>
        <div v-else>
          <div class="media">
            <div class="media-body text-center">
              <span class>
                <strong>No notifications</strong>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </li>
</template>
<script>
import VueTimeago from "vue-timeago";

Vue.use(VueTimeago, {
  name: "Timeago", // Component name, `Timeago` by default
  locale: "en", // Default locale
  // We use `date-fns` under the hood
  // So you can use all locales from it
  locales: {
    "zh-CN": require("date-fns/locale/zh_cn"),
    ja: require("date-fns/locale/ja")
  }
});

export default {
  props: ["user_id"],
  data() {
    return {
      notifications: []
    };
  },
  mounted() {
    Echo.channel("pizza-tracker").listen("OrderStatusChanged", order => {
      if ((this.user_id = order.user_id)) {
        this.notifications.unshift({
          description: "Order ID: " + order.id + " updated",
          url: "/order/" + order.id,
          time: new Date()
        });
      }
    });
  }
};
</script>
<style scoped>
.badge-danger-nav {
  color: #fff;
  background-color: #e3342f;
  position: relative;
  top: -10px;
  left: -5px;
}
</style>