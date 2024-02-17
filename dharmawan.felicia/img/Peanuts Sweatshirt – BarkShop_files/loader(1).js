!(function createScript(source) {
  const shortname = source.replace(".attn.tv", "");
  const script = document.createElement("script");
  script.setAttribute("async", "true");
  script.type = "text/javascript";
  script.src = `https://cdn.attn.tv/${shortname}/dtag.js`;
  document.querySelector("head").appendChild(script);
})(window.__attentive_domain);
