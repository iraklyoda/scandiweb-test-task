import { configure } from "vee-validate";
import { localize, setLocale } from "@vee-validate/i18n";
import en from "@vee-validate/i18n/dist/locale/en.json";
configure({
  generateMessage: localize({
    en: {
      ...en,
    },
  }),
});
setLocale("en");
