import { defineRule } from "vee-validate";
import {
  required,
  integer,
  min,
  max,
} from "@vee-validate/rules";

defineRule("required", required);
defineRule("integer", integer);
defineRule("min", min);
defineRule("max", max);
