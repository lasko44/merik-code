<script setup>
import {computed, reactive} from "vue";
import {CheckCircleIcon, LockClosedIcon, ArrowRightCircleIcon, ForwardIcon, InformationCircleIcon} from "@heroicons/vue/24/outline/index.js";
import IconStatus from "@/Shared/Indicators/IconStatus.vue";
import "../Props/common.js"
import {actionProp, defaultFalseBoolProp} from "@/Shared/Props/common.js";

const props = defineProps({
  inProgress: defaultFalseBoolProp,
  completed: defaultFalseBoolProp,
  locked: defaultFalseBoolProp,
  action: actionProp
});

const statuses = {
    getStarted: 'Get Started!',
    inProgress: 'In Progress!',
    completed: 'Completed!',
    locked: 'Locked',
    error: 'Error!',
};

const classes = {
  getStarted: 'text-cyan-700',
  inProgress: 'text-cyan-700',
  completed: 'text-emerald-600',
  locked: 'text-neutral-800',
  error: 'text-red-500',
}

const components = {
  completed: CheckCircleIcon,
  inProgress: ForwardIcon,
  locked: LockClosedIcon,
  getStarted: ArrowRightCircleIcon,
  error: InformationCircleIcon,
}

const status = computed(() => {
  if (props.locked || !props.action) {
    return statuses.locked;
  }
  if (props.completed) {
    return statuses.completed;
  }
  if (props.inProgress) {
    return statuses.inProgress;
  }
  if (!props.inProgress && !props.completed && !props.locked) {
    return statuses.getStarted;
  }
  return statuses.error;
});

const component = computed(() => {
  switch (status.value){
    case statuses.inProgress:
      return{
        label: statuses.inProgress,
        component: components.inProgress,
        class: classes.inProgress,
      };
    case statuses.completed:
      return {
        label: statuses.completed,
        component: components.completed,
        class: classes.completed,
      };
    case statuses.getStarted:
      return {
        label: statuses.getStarted,
        component: components.getStarted,
        class: classes.getStarted,
      };
    case statuses.locked:
      return {
        label: statuses.locked,
        component: components.locked,
        class: classes.locked
      };
    default:
      return {
        label: statuses.error,
        component: components.error,
        class: classes.error
      };
  }
});
</script>

<template>
  <IconStatus :label="component.label" :custom-class="component.class" :action="action">
    <component :is="component.component"></component>
  </IconStatus>
</template>
