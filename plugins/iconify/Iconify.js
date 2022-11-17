/**
 * (c) Iconify
 *
 * For the full copyright and license information, please view the license.txt or license.gpl.txt
 * files at https://github.com/iconify/iconify
 *
 * Licensed under Apache 2.0 or GPL 2.0 at your option.
 * If derivative product is not compatible with one of licenses, you can pick one of licenses.
 *
 * @license Apache 2.0
 * @license GPL 2.0
 * @version 2.2.1
 */
var Iconify = (function (e) {
  "use strict";
  var n = /^[a-z0-9]+(-[a-z0-9]+)*$/,
    t = Object.freeze({
      left: 0,
      top: 0,
      width: 16,
      height: 16,
      rotate: 0,
      vFlip: !1,
      hFlip: !1,
    });
  function r(e) {
    return Object.assign({}, t, e);
  }
  function i(e, n, i) {
    void 0 === i && (i = !1);
    var o = (function n(r, i) {
      if (void 0 !== e.icons[r]) return Object.assign({}, e.icons[r]);
      if (i > 5) return null;
      var o = e.aliases;
      if (o && void 0 !== o[r]) {
        var a = o[r],
          c = n(a.parent, i + 1);
        return c
          ? (function (e, n) {
              var r = Object.assign({}, e);
              for (var i in t) {
                var o = i;
                if (void 0 !== n[o]) {
                  var a = n[o];
                  if (void 0 === r[o]) {
                    r[o] = a;
                    continue;
                  }
                  switch (o) {
                    case "rotate":
                      r[o] = (r[o] + a) % 4;
                      break;
                    case "hFlip":
                    case "vFlip":
                      r[o] = a !== r[o];
                      break;
                    default:
                      r[o] = a;
                  }
                }
              }
              return r;
            })(c, a)
          : c;
      }
      var f = e.chars;
      return !i && f && void 0 !== f[r] ? n(f[r], i + 1) : null;
    })(n, 0);
    if (o) for (var a in t) void 0 === o[a] && void 0 !== e[a] && (o[a] = e[a]);
    return o && i ? r(o) : o;
  }
  function o(e, n, r) {
    r = r || {};
    var o = [];
    if ("object" != typeof e || "object" != typeof e.icons) return o;
    e.not_found instanceof Array &&
      e.not_found.forEach(function (e) {
        n(e, null), o.push(e);
      });
    var a = e.icons;
    Object.keys(a).forEach(function (t) {
      var r = i(e, t, !0);
      r && (n(t, r), o.push(t));
    });
    var c = r.aliases || "all";
    if ("none" !== c && "object" == typeof e.aliases) {
      var f = e.aliases;
      Object.keys(f).forEach(function (r) {
        if (
          "variations" !== c ||
          !(function (e) {
            for (var n in t) if (void 0 !== e[n]) return !0;
            return !1;
          })(f[r])
        ) {
          var a = i(e, r, !0);
          a && (n(r, a), o.push(r));
        }
      });
    }
    return o;
  }
  var a = { provider: "string", aliases: "object", not_found: "object" };
  for (var c in t) a[c] = typeof t[c];
  function f(e) {
    if ("object" != typeof e || null === e) return null;
    var r = e;
    if ("string" != typeof r.prefix || !e.icons || "object" != typeof e.icons)
      return null;
    for (var i in a) if (void 0 !== e[i] && typeof e[i] !== a[i]) return null;
    var o = r.icons;
    for (var c in o) {
      var f = o[c];
      if (!c.match(n) || "string" != typeof f.body) return null;
      for (var u in t)
        if (void 0 !== f[u] && typeof f[u] != typeof t[u]) return null;
    }
    var s = r.aliases;
    if (s)
      for (var l in s) {
        var v = s[l],
          d = v.parent;
        if (!l.match(n) || "string" != typeof d || (!o[d] && !s[d]))
          return null;
        for (var p in t)
          if (void 0 !== v[p] && typeof v[p] != typeof t[p]) return null;
      }
    return r;
  }
  var u = function (e, n, t, r) {
      void 0 === r && (r = "");
      var i = e.split(":");
      if ("@" === e.slice(0, 1)) {
        if (i.length < 2 || i.length > 3) return null;
        r = i.shift().slice(1);
      }
      if (i.length > 3 || !i.length) return null;
      if (i.length > 1) {
        var o = i.pop(),
          a = i.pop(),
          c = { provider: i.length > 0 ? i[0] : r, prefix: a, name: o };
        return n && !s(c) ? null : c;
      }
      var f = i[0],
        u = f.split("-");
      if (u.length > 1) {
        var l = { provider: r, prefix: u.shift(), name: u.join("-") };
        return n && !s(l) ? null : l;
      }
      if (t && "" === r) {
        var v = { provider: r, prefix: "", name: f };
        return n && !s(v, t) ? null : v;
      }
      return null;
    },
    s = function (e, t) {
      return (
        !!e &&
        !(
          ("" !== e.provider && !e.provider.match(n)) ||
          !((t && "" === e.prefix) || e.prefix.match(n)) ||
          !e.name.match(n)
        )
      );
    },
    l = Object.create(null);
  try {
    var v = window || self;
    v && 1 === v._iconifyStorage.version && (l = v._iconifyStorage.storage);
  } catch (Mn) {}
  function d() {
    try {
      var e = window || self;
      e &&
        !e._iconifyStorage &&
        (e._iconifyStorage = { version: 1, storage: l });
    } catch (e) {}
  }
  function p(e, n) {
    void 0 === l[e] && (l[e] = Object.create(null));
    var t = l[e];
    return (
      void 0 === t[n] &&
        (t[n] = (function (e, n) {
          return {
            provider: e,
            prefix: n,
            icons: Object.create(null),
            missing: Object.create(null),
          };
        })(e, n)),
      t[n]
    );
  }
  function h(e, n) {
    if (!f(n)) return [];
    var t = Date.now();
    return o(n, function (n, r) {
      r ? (e.icons[n] = r) : (e.missing[n] = t);
    });
  }
  function g(e, n) {
    var t = e.icons[n];
    return void 0 === t ? null : t;
  }
  function m(e, n) {
    var t = [];
    return (
      ("string" == typeof e ? [e] : Object.keys(l)).forEach(function (e) {
        ("string" == typeof e && "string" == typeof n
          ? [n]
          : void 0 === l[e]
          ? []
          : Object.keys(l[e])
        ).forEach(function (n) {
          var r = p(e, n),
            i = Object.keys(r.icons).map(function (t) {
              return ("" !== e ? "@" + e + ":" : "") + n + ":" + t;
            });
          t = t.concat(i);
        });
      }),
      t
    );
  }
  var y = !1;
  function b(e) {
    var n = "string" == typeof e ? u(e, !0, y) : e;
    return n ? g(p(n.provider, n.prefix), n.name) : null;
  }
  function x(e, n) {
    var t = u(e, !0, y);
    return (
      !!t &&
      (function (e, n, t) {
        try {
          if ("string" == typeof t.body)
            return (e.icons[n] = Object.freeze(r(t))), !0;
        } catch (e) {}
        return !1;
      })(p(t.provider, t.prefix), t.name, n)
    );
  }
  function j(e, n) {
    if ("object" != typeof e) return !1;
    if (
      ("string" != typeof n &&
        (n = "string" == typeof e.provider ? e.provider : ""),
      y && "" === n && ("string" != typeof e.prefix || "" === e.prefix))
    ) {
      var t = !1;
      return (
        f(e) &&
          ((e.prefix = ""),
          o(e, function (e, n) {
            n && x(e, n) && (t = !0);
          })),
        t
      );
    }
    return (
      !(
        "string" != typeof e.prefix ||
        !s({ provider: n, prefix: e.prefix, name: "a" })
      ) && !!h(p(n, e.prefix), e)
    );
  }
  function w(e) {
    return null !== b(e);
  }
  function O(e) {
    var n = b(e);
    return n ? Object.assign({}, n) : null;
  }
  var E = Object.freeze({
    inline: !1,
    width: null,
    height: null,
    hAlign: "center",
    vAlign: "middle",
    slice: !1,
    hFlip: !1,
    vFlip: !1,
    rotate: 0,
  });
  function I(e, n) {
    var t = {};
    for (var r in e) {
      var i = r;
      if (((t[i] = e[i]), void 0 !== n[i])) {
        var o = n[i];
        switch (i) {
          case "inline":
          case "slice":
            "boolean" == typeof o && (t[i] = o);
            break;
          case "hFlip":
          case "vFlip":
            !0 === o && (t[i] = !t[i]);
            break;
          case "hAlign":
          case "vAlign":
            "string" == typeof o && "" !== o && (t[i] = o);
            break;
          case "width":
          case "height":
            (("string" == typeof o && "" !== o) ||
              ("number" == typeof o && o) ||
              null === o) &&
              (t[i] = o);
            break;
          case "rotate":
            "number" == typeof o && (t[i] += o);
        }
      }
    }
    return t;
  }
  var S = /(-?[0-9.]*[0-9]+[0-9.]*)/g,
    k = /^-?[0-9.]*[0-9]+[0-9.]*$/g;
  function A(e, n, t) {
    if (1 === n) return e;
    if (((t = void 0 === t ? 100 : t), "number" == typeof e))
      return Math.ceil(e * n * t) / t;
    if ("string" != typeof e) return e;
    var r = e.split(S);
    if (null === r || !r.length) return e;
    for (var i = [], o = r.shift(), a = k.test(o); ; ) {
      if (a) {
        var c = parseFloat(o);
        isNaN(c) ? i.push(o) : i.push(Math.ceil(c * n * t) / t);
      } else i.push(o);
      if (void 0 === (o = r.shift())) return i.join("");
      a = !a;
    }
  }
  function M(e) {
    var n = "";
    switch (e.hAlign) {
      case "left":
        n += "xMin";
        break;
      case "right":
        n += "xMax";
        break;
      default:
        n += "xMid";
    }
    switch (e.vAlign) {
      case "top":
        n += "YMin";
        break;
      case "bottom":
        n += "YMax";
        break;
      default:
        n += "YMid";
    }
    return (n += e.slice ? " slice" : " meet");
  }
  function T(e, n) {
    var t,
      r,
      i = { left: e.left, top: e.top, width: e.width, height: e.height },
      o = e.body;
    [e, n].forEach(function (e) {
      var n,
        t = [],
        r = e.hFlip,
        a = e.vFlip,
        c = e.rotate;
      switch (
        (r
          ? a
            ? (c += 2)
            : (t.push(
                "translate(" +
                  (i.width + i.left).toString() +
                  " " +
                  (0 - i.top).toString() +
                  ")"
              ),
              t.push("scale(-1 1)"),
              (i.top = i.left = 0))
          : a &&
            (t.push(
              "translate(" +
                (0 - i.left).toString() +
                " " +
                (i.height + i.top).toString() +
                ")"
            ),
            t.push("scale(1 -1)"),
            (i.top = i.left = 0)),
        c < 0 && (c -= 4 * Math.floor(c / 4)),
        (c %= 4))
      ) {
        case 1:
          (n = i.height / 2 + i.top),
            t.unshift("rotate(90 " + n.toString() + " " + n.toString() + ")");
          break;
        case 2:
          t.unshift(
            "rotate(180 " +
              (i.width / 2 + i.left).toString() +
              " " +
              (i.height / 2 + i.top).toString() +
              ")"
          );
          break;
        case 3:
          (n = i.width / 2 + i.left),
            t.unshift("rotate(-90 " + n.toString() + " " + n.toString() + ")");
      }
      c % 2 == 1 &&
        ((0 === i.left && 0 === i.top) ||
          ((n = i.left), (i.left = i.top), (i.top = n)),
        i.width !== i.height &&
          ((n = i.width), (i.width = i.height), (i.height = n))),
        t.length && (o = '<g transform="' + t.join(" ") + '">' + o + "</g>");
    }),
      null === n.width && null === n.height
        ? (t = A((r = "1em"), i.width / i.height))
        : null !== n.width && null !== n.height
        ? ((t = n.width), (r = n.height))
        : null !== n.height
        ? (t = A((r = n.height), i.width / i.height))
        : (r = A((t = n.width), i.height / i.width)),
      "auto" === t && (t = i.width),
      "auto" === r && (r = i.height);
    var a = {
      attributes: {
        width: (t = "string" == typeof t ? t : t.toString() + ""),
        height: (r = "string" == typeof r ? r : r.toString() + ""),
        preserveAspectRatio: M(n),
        viewBox:
          i.left.toString() +
          " " +
          i.top.toString() +
          " " +
          i.width.toString() +
          " " +
          i.height.toString(),
      },
      body: o,
    };
    return n.inline && (a.inline = !0), a;
  }
  function F(e, n) {
    return T(r(e), n ? I(E, n) : E);
  }
  var P = /\sid="(\S+)"/g,
    C =
      "IconifyId" +
      Date.now().toString(16) +
      ((16777216 * Math.random()) | 0).toString(16),
    _ = 0;
  function D(e, n) {
    void 0 === n && (n = C);
    for (var t, r = []; (t = P.exec(e)); ) r.push(t[1]);
    return r.length
      ? (r.forEach(function (t) {
          var r = "function" == typeof n ? n(t) : n + (_++).toString(),
            i = t.replace(/[.*+?^${}()|[\]\\]/g, "\\$&");
          e = e.replace(
            new RegExp('([#;"])(' + i + ')([")]|\\.[a-z])', "g"),
            "$1" + r + "$3"
          );
        }),
        e)
      : e;
  }
  var L = "iconify2",
    N = "iconify",
    R = "iconify-count",
    z = "iconify-version",
    U = 36e5,
    q = { local: !0, session: !0 },
    $ = !1,
    H = { local: 0, session: 0 },
    V = { local: [], session: [] },
    Y = "undefined" == typeof window ? {} : window;
  function G(e) {
    var n = e + "Storage";
    try {
      if (Y && Y[n] && "number" == typeof Y[n].length) return Y[n];
    } catch (e) {}
    return (q[e] = !1), null;
  }
  function J(e, n, t) {
    try {
      return e.setItem(R, t.toString()), (H[n] = t), !0;
    } catch (e) {
      return !1;
    }
  }
  function B(e) {
    var n = e.getItem(R);
    if (n) {
      var t = parseInt(n);
      return t || 0;
    }
    return 0;
  }
  var Q = function () {
      if (!$) {
        $ = !0;
        var e = Math.floor(Date.now() / U) - 168;
        for (var n in q) t(n);
      }
      function t(n) {
        var t = G(n);
        if (t) {
          var r = function (n) {
            var r = N + n.toString(),
              i = t.getItem(r);
            if ("string" != typeof i) return !1;
            var o = !0;
            try {
              var a = JSON.parse(i);
              if (
                "object" != typeof a ||
                "number" != typeof a.cached ||
                a.cached < e ||
                "string" != typeof a.provider ||
                "object" != typeof a.data ||
                "string" != typeof a.data.prefix
              )
                o = !1;
              else o = h(p(a.provider, a.data.prefix), a.data).length > 0;
            } catch (e) {
              o = !1;
            }
            return o || t.removeItem(r), o;
          };
          try {
            var i = t.getItem(z);
            if (i !== L)
              return (
                i &&
                  (function (e) {
                    try {
                      for (var n = B(e), t = 0; t < n; t++)
                        e.removeItem(N + t.toString());
                    } catch (e) {}
                  })(t),
                void (function (e, n) {
                  try {
                    e.setItem(z, L);
                  } catch (e) {}
                  J(e, n, 0);
                })(t, n)
              );
            for (var o = B(t), a = o - 1; a >= 0; a--)
              r(a) || (a === o - 1 ? o-- : V[n].push(a));
            J(t, n, o);
          } catch (e) {}
        }
      }
    },
    K = {};
  function W(e, n) {
    switch (e) {
      case "local":
      case "session":
        q[e] = n;
        break;
      case "all":
        for (var t in q) q[t] = n;
    }
  }
  var X = Object.create(null);
  function Z(e, n) {
    X[e] = n;
  }
  function ee(e) {
    return X[e] || X[""];
  }
  function ne(e) {
    var n;
    if ("string" == typeof e.resources) n = [e.resources];
    else if (!((n = e.resources) instanceof Array && n.length)) return null;
    return {
      resources: n,
      path: void 0 === e.path ? "/" : e.path,
      maxURL: e.maxURL ? e.maxURL : 500,
      rotate: e.rotate ? e.rotate : 750,
      timeout: e.timeout ? e.timeout : 5e3,
      random: !0 === e.random,
      index: e.index ? e.index : 0,
      dataAfterTimeout: !1 !== e.dataAfterTimeout,
    };
  }
  for (
    var te = Object.create(null),
      re = ["https://api.simplesvg.com", "https://api.unisvg.com"],
      ie = [];
    re.length > 0;

  )
    1 === re.length || Math.random() > 0.5
      ? ie.push(re.shift())
      : ie.push(re.pop());
  function oe(e, n) {
    var t = ne(n);
    return null !== t && ((te[e] = t), !0);
  }
  function ae(e) {
    return te[e];
  }
  te[""] = ne({ resources: ["https://api.iconify.design"].concat(ie) });
  var ce = function (e, n) {
      var t = e,
        r = -1 !== t.indexOf("?");
      return (
        Object.keys(n).forEach(function (e) {
          var i;
          try {
            i = (function (e) {
              switch (typeof e) {
                case "boolean":
                  return e ? "true" : "false";
                case "number":
                case "string":
                  return encodeURIComponent(e);
                default:
                  throw new Error("Invalid parameter");
              }
            })(n[e]);
          } catch (e) {
            return;
          }
          (t += (r ? "&" : "?") + encodeURIComponent(e) + "=" + i), (r = !0);
        }),
        t
      );
    },
    fe = {},
    ue = {},
    se = (function () {
      var e;
      try {
        if ("function" == typeof (e = fetch)) return e;
      } catch (e) {}
      return null;
    })();
  var le = {
    prepare: function (e, n, t) {
      var r = [],
        i = fe[n];
      void 0 === i &&
        (i = (function (e, n) {
          var t,
            r = ae(e);
          if (!r) return 0;
          if (r.maxURL) {
            var i = 0;
            r.resources.forEach(function (e) {
              var n = e;
              i = Math.max(i, n.length);
            });
            var o = ce(n + ".json", { icons: "" });
            t = r.maxURL - i - r.path.length - o.length;
          } else t = 0;
          var a = e + ":" + n;
          return (ue[e] = r.path), (fe[a] = t), t;
        })(e, n));
      var o = "icons",
        a = { type: o, provider: e, prefix: n, icons: [] },
        c = 0;
      return (
        t.forEach(function (t, f) {
          (c += t.length + 1) >= i &&
            f > 0 &&
            (r.push(a),
            (a = { type: o, provider: e, prefix: n, icons: [] }),
            (c = t.length)),
            a.icons.push(t);
        }),
        r.push(a),
        r
      );
    },
    send: function (e, n, t) {
      if (se) {
        var r = (function (e) {
          if ("string" == typeof e) {
            if (void 0 === ue[e]) {
              var n = ae(e);
              if (!n) return "/";
              ue[e] = n.path;
            }
            return ue[e];
          }
          return "/";
        })(n.provider);
        switch (n.type) {
          case "icons":
            var i = n.prefix,
              o = n.icons.join(",");
            r += ce(i + ".json", { icons: o });
            break;
          case "custom":
            var a = n.uri;
            r += "/" === a.slice(0, 1) ? a.slice(1) : a;
            break;
          default:
            return void t("abort", 400);
        }
        var c = 503;
        se(e + r)
          .then(function (e) {
            var n = e.status;
            if (200 === n) return (c = 501), e.json();
            setTimeout(function () {
              t(
                (function (e) {
                  return 404 === e;
                })(n)
                  ? "abort"
                  : "next",
                n
              );
            });
          })
          .then(function (e) {
            "object" == typeof e && null !== e
              ? setTimeout(function () {
                  t("success", e);
                })
              : setTimeout(function () {
                  t("next", c);
                });
          })
          .catch(function () {
            t("next", c);
          });
      } else t("abort", 424);
    },
  };
  var ve = Object.create(null),
    de = Object.create(null);
  function pe(e, n) {
    e.forEach(function (e) {
      var t = e.provider;
      if (void 0 !== ve[t]) {
        var r = ve[t],
          i = e.prefix,
          o = r[i];
        o &&
          (r[i] = o.filter(function (e) {
            return e.id !== n;
          }));
      }
    });
  }
  var he = 0;
  var ge = {
    resources: [],
    index: 0,
    timeout: 2e3,
    rotate: 750,
    random: !1,
    dataAfterTimeout: !1,
  };
  function me(e, n, t, r) {
    var i,
      o = e.resources.length,
      a = e.random ? Math.floor(Math.random() * o) : e.index;
    if (e.random) {
      var c = e.resources.slice(0);
      for (i = []; c.length > 1; ) {
        var f = Math.floor(Math.random() * c.length);
        i.push(c[f]), (c = c.slice(0, f).concat(c.slice(f + 1)));
      }
      i = i.concat(c);
    } else i = e.resources.slice(a).concat(e.resources.slice(0, a));
    var u,
      s = Date.now(),
      l = "pending",
      v = 0,
      d = null,
      p = [],
      h = [];
    function g() {
      d && (clearTimeout(d), (d = null));
    }
    function m() {
      "pending" === l && (l = "aborted"),
        g(),
        p.forEach(function (e) {
          "pending" === e.status && (e.status = "aborted");
        }),
        (p = []);
    }
    function y(e, n) {
      n && (h = []), "function" == typeof e && h.push(e);
    }
    function b() {
      (l = "failed"),
        h.forEach(function (e) {
          e(void 0, u);
        });
    }
    function x() {
      p.forEach(function (e) {
        "pending" === e.status && (e.status = "aborted");
      }),
        (p = []);
    }
    function j() {
      if ("pending" === l) {
        g();
        var r = i.shift();
        if (void 0 === r)
          return p.length
            ? void (d = setTimeout(function () {
                g(), "pending" === l && (x(), b());
              }, e.timeout))
            : void b();
        var o = {
          status: "pending",
          resource: r,
          callback: function (n, t) {
            !(function (n, t, r) {
              var o = "success" !== t;
              switch (
                ((p = p.filter(function (e) {
                  return e !== n;
                })),
                l)
              ) {
                case "pending":
                  break;
                case "failed":
                  if (o || !e.dataAfterTimeout) return;
                  break;
                default:
                  return;
              }
              if ("abort" === t) return (u = r), void b();
              if (o) return (u = r), void (p.length || (i.length ? j() : b()));
              if ((g(), x(), !e.random)) {
                var a = e.resources.indexOf(n.resource);
                -1 !== a && a !== e.index && (e.index = a);
              }
              (l = "completed"),
                h.forEach(function (e) {
                  e(r);
                });
            })(o, n, t);
          },
        };
        p.push(o), v++, (d = setTimeout(j, e.rotate)), t(r, n, o.callback);
      }
    }
    return (
      "function" == typeof r && h.push(r),
      setTimeout(j),
      function () {
        return {
          startTime: s,
          payload: n,
          status: l,
          queriesSent: v,
          queriesPending: p.length,
          subscribe: y,
          abort: m,
        };
      }
    );
  }
  function ye(e) {
    var n = (function (e) {
        if (
          !(
            "object" == typeof e &&
            "object" == typeof e.resources &&
            e.resources instanceof Array &&
            e.resources.length
          )
        )
          throw new Error("Invalid Reduncancy configuration");
        var n,
          t = Object.create(null);
        for (n in ge) void 0 !== e[n] ? (t[n] = e[n]) : (t[n] = ge[n]);
        return t;
      })(e),
      t = [];
    function r() {
      t = t.filter(function (e) {
        return "pending" === e().status;
      });
    }
    var i = {
      query: function (e, i, o) {
        var a = me(n, e, i, function (e, n) {
          r(), o && o(e, n);
        });
        return t.push(a), a;
      },
      find: function (e) {
        var n = t.find(function (n) {
          return e(n);
        });
        return void 0 !== n ? n : null;
      },
      setIndex: function (e) {
        n.index = e;
      },
      getIndex: function () {
        return n.index;
      },
      cleanup: r,
    };
    return i;
  }
  function be() {}
  var xe = Object.create(null);
  function je(e, n, t) {
    var r, i;
    if ("string" == typeof e) {
      var o = ee(e);
      if (!o) return t(void 0, 424), be;
      i = o.send;
      var a = (function (e) {
        if (void 0 === xe[e]) {
          var n = ae(e);
          if (!n) return;
          var t = { config: n, redundancy: ye(n) };
          xe[e] = t;
        }
        return xe[e];
      })(e);
      a && (r = a.redundancy);
    } else {
      var c = ne(e);
      if (c) {
        r = ye(c);
        var f = ee(e.resources ? e.resources[0] : "");
        f && (i = f.send);
      }
    }
    return r && i ? r.query(n, i, t)().abort : (t(void 0, 424), be);
  }
  function we() {}
  var Oe = Object.create(null),
    Ee = Object.create(null),
    Ie = Object.create(null),
    Se = Object.create(null);
  function ke(e, n) {
    void 0 === Ie[e] && (Ie[e] = Object.create(null));
    var t = Ie[e];
    t[n] ||
      ((t[n] = !0),
      setTimeout(function () {
        (t[n] = !1),
          (function (e, n) {
            void 0 === de[e] && (de[e] = Object.create(null));
            var t = de[e];
            t[n] ||
              ((t[n] = !0),
              setTimeout(function () {
                if (((t[n] = !1), void 0 !== ve[e] && void 0 !== ve[e][n])) {
                  var r = ve[e][n].slice(0);
                  if (r.length) {
                    var i = p(e, n),
                      o = !1;
                    r.forEach(function (t) {
                      var r = t.icons,
                        a = r.pending.length;
                      (r.pending = r.pending.filter(function (t) {
                        if (t.prefix !== n) return !0;
                        var a = t.name;
                        if (void 0 !== i.icons[a])
                          r.loaded.push({ provider: e, prefix: n, name: a });
                        else {
                          if (void 0 === i.missing[a]) return (o = !0), !0;
                          r.missing.push({ provider: e, prefix: n, name: a });
                        }
                        return !1;
                      })),
                        r.pending.length !== a &&
                          (o || pe([{ provider: e, prefix: n }], t.id),
                          t.callback(
                            r.loaded.slice(0),
                            r.missing.slice(0),
                            r.pending.slice(0),
                            t.abort
                          ));
                    });
                  }
                }
              }));
          })(e, n);
      }));
  }
  var Ae = Object.create(null);
  function Me(e, n, t) {
    void 0 === Ee[e] && (Ee[e] = Object.create(null));
    var r = Ee[e];
    void 0 === Se[e] && (Se[e] = Object.create(null));
    var i = Se[e];
    void 0 === Oe[e] && (Oe[e] = Object.create(null));
    var o = Oe[e];
    void 0 === r[n] ? (r[n] = t) : (r[n] = r[n].concat(t).sort()),
      i[n] ||
        ((i[n] = !0),
        setTimeout(function () {
          i[n] = !1;
          var t = r[n];
          delete r[n];
          var a = ee(e);
          a
            ? a.prepare(e, n, t).forEach(function (t) {
                je(e, t, function (r, i) {
                  var a = p(e, n);
                  if ("object" != typeof r) {
                    if (404 !== i) return;
                    var c = Date.now();
                    t.icons.forEach(function (e) {
                      a.missing[e] = c;
                    });
                  } else
                    try {
                      var f = h(a, r);
                      if (!f.length) return;
                      var u = o[n];
                      f.forEach(function (e) {
                        delete u[e];
                      }),
                        K.store && K.store(e, r);
                    } catch (e) {
                      console.error(e);
                    }
                  ke(e, n);
                });
              })
            : (function () {
                var t = ("" === e ? "" : "@" + e + ":") + n,
                  r = Math.floor(Date.now() / 6e4);
                Ae[t] < r &&
                  ((Ae[t] = r),
                  console.error(
                    'Unable to retrieve icons for "' +
                      t +
                      '" because API is not configured properly.'
                  ));
              })();
        }));
  }
  var Te = function (e) {
      var n = e.provider,
        t = e.prefix;
      return Oe[n] && Oe[n][t] && void 0 !== Oe[n][t][e.name];
    },
    Fe = function (e, n) {
      var t,
        r = (function (e) {
          var n = { loaded: [], missing: [], pending: [] },
            t = Object.create(null);
          e.sort(function (e, n) {
            return e.provider !== n.provider
              ? e.provider.localeCompare(n.provider)
              : e.prefix !== n.prefix
              ? e.prefix.localeCompare(n.prefix)
              : e.name.localeCompare(n.name);
          });
          var r = { provider: "", prefix: "", name: "" };
          return (
            e.forEach(function (e) {
              if (
                r.name !== e.name ||
                r.prefix !== e.prefix ||
                r.provider !== e.provider
              ) {
                r = e;
                var i = e.provider,
                  o = e.prefix,
                  a = e.name;
                void 0 === t[i] && (t[i] = Object.create(null));
                var c = t[i];
                void 0 === c[o] && (c[o] = p(i, o));
                var f = c[o],
                  u = { provider: i, prefix: o, name: a };
                (void 0 !== f.icons[a]
                  ? n.loaded
                  : "" === o || void 0 !== f.missing[a]
                  ? n.missing
                  : n.pending
                ).push(u);
              }
            }),
            n
          );
        })(
          (function (e, n, t) {
            void 0 === n && (n = !0), void 0 === t && (t = !1);
            var r = [];
            return (
              e.forEach(function (e) {
                var i = "string" == typeof e ? u(e, !1, t) : e;
                (n && !s(i, t)) ||
                  r.push({
                    provider: i.provider,
                    prefix: i.prefix,
                    name: i.name,
                  });
              }),
              r
            );
          })(e, !0, ("boolean" == typeof t && (y = t), y))
        );
      if (!r.pending.length) {
        var i = !0;
        return (
          n &&
            setTimeout(function () {
              i && n(r.loaded, r.missing, r.pending, we);
            }),
          function () {
            i = !1;
          }
        );
      }
      var o,
        a,
        c = Object.create(null),
        f = [];
      r.pending.forEach(function (e) {
        var n = e.provider,
          t = e.prefix;
        if (t !== a || n !== o) {
          (o = n),
            (a = t),
            f.push({ provider: n, prefix: t }),
            void 0 === Oe[n] && (Oe[n] = Object.create(null));
          var r = Oe[n];
          void 0 === r[t] && (r[t] = Object.create(null)),
            void 0 === c[n] && (c[n] = Object.create(null));
          var i = c[n];
          void 0 === i[t] && (i[t] = []);
        }
      });
      var l = Date.now();
      return (
        r.pending.forEach(function (e) {
          var n = e.provider,
            t = e.prefix,
            r = e.name,
            i = Oe[n][t];
          void 0 === i[r] && ((i[r] = l), c[n][t].push(r));
        }),
        f.forEach(function (e) {
          var n = e.provider,
            t = e.prefix;
          c[n][t].length && Me(n, t, c[n][t]);
        }),
        n
          ? (function (e, n, t) {
              var r = he++,
                i = pe.bind(null, t, r);
              if (!n.pending.length) return i;
              var o = { id: r, icons: n, callback: e, abort: i };
              return (
                t.forEach(function (e) {
                  var n = e.provider,
                    t = e.prefix;
                  void 0 === ve[n] && (ve[n] = Object.create(null));
                  var r = ve[n];
                  void 0 === r[t] && (r[t] = []), r[t].push(o);
                }),
                i
              );
            })(n, r, f)
          : we
      );
    },
    Pe = function (e) {
      return new Promise(function (n, t) {
        var r = "string" == typeof e ? u(e) : e;
        Fe([r || e], function (i) {
          if (i.length && r) {
            var o = g(p(r.provider, r.prefix), r.name);
            if (o) return void n(o);
          }
          t(e);
        });
      });
    },
    Ce = "iconifyFinder" + Date.now(),
    _e = "iconifyData" + Date.now();
  function De(e, n, t, r) {
    var i;
    try {
      i = document.createElement("span");
    } catch (e) {
      return r ? "" : null;
    }
    var o = T(t, I(E, n)),
      a = e.element,
      c = e.finder,
      f = e.name,
      u = a ? a.getAttribute("class") : "",
      s = c ? c.classFilter(u ? u.split(/\s+/) : []) : [],
      l =
        '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="' +
        ("iconify iconify--" +
          f.prefix +
          ("" === f.provider ? "" : " iconify--" + f.provider) +
          (s.length ? " " + s.join(" ") : "")) +
        '">' +
        D(o.body) +
        "</svg>";
    i.innerHTML = l;
    var v = i.childNodes[0],
      d = v.style,
      p = o.attributes;
    if (
      (Object.keys(p).forEach(function (e) {
        v.setAttribute(e, p[e]);
      }),
      o.inline && (d.verticalAlign = "-0.125em"),
      a)
    ) {
      for (var h = a.attributes, g = 0; g < h.length; g++) {
        var m = h.item(g);
        if (m) {
          var y = m.name;
          if ("class" !== y && "style" !== y && void 0 === p[y])
            try {
              v.setAttribute(y, m.value);
            } catch (e) {}
        }
      }
      for (var b = a.style, x = 0; x < b.length; x++) {
        var j = b[x];
        d[j] = b[j];
      }
    }
    if (c) {
      var w = { name: f, status: "loaded", customisations: n };
      (v[_e] = w), (v[Ce] = c);
    }
    var O = r ? i.innerHTML : v;
    return (
      a && a.parentNode ? a.parentNode.replaceChild(v, a) : i.removeChild(v), O
    );
  }
  var Le = [];
  function Ne(e) {
    for (var n = 0; n < Le.length; n++) {
      var t = Le[n];
      if (("function" == typeof t.node ? t.node() : t.node) === e) return t;
    }
  }
  function Re(e, n) {
    void 0 === n && (n = !1);
    var t = Ne(e);
    return t
      ? (t.temporary && (t.temporary = n), t)
      : ((t = { node: e, temporary: n }), Le.push(t), t);
  }
  function ze() {
    return Le;
  }
  var Ue = null,
    qe = { childList: !0, subtree: !0, attributes: !0 };
  function $e(e) {
    if (e.observer) {
      var n = e.observer;
      n.pendingScan ||
        (n.pendingScan = setTimeout(function () {
          delete n.pendingScan, Ue && Ue(e);
        }));
    }
  }
  function He(e, n) {
    if (e.observer) {
      var t = e.observer;
      if (!t.pendingScan)
        for (var r = 0; r < n.length; r++) {
          var i = n[r];
          if (
            (i.addedNodes && i.addedNodes.length > 0) ||
            ("attributes" === i.type && void 0 !== i.target[Ce])
          )
            return void (t.paused || $e(e));
        }
    }
  }
  function Ve(e, n) {
    e.observer.instance.observe(n, qe);
  }
  function Ye(e) {
    var n = e.observer;
    if (!n || !n.instance) {
      var t = "function" == typeof e.node ? e.node() : e.node;
      t &&
        (n || ((n = { paused: 0 }), (e.observer = n)),
        (n.instance = new MutationObserver(He.bind(null, e))),
        Ve(e, t),
        n.paused || $e(e));
    }
  }
  function Ge() {
    ze().forEach(Ye);
  }
  function Je(e) {
    if (e.observer) {
      var n = e.observer;
      n.pendingScan && (clearTimeout(n.pendingScan), delete n.pendingScan),
        n.instance && (n.instance.disconnect(), delete n.instance);
    }
  }
  function Be(e) {
    var n = null !== Ue;
    Ue !== e && ((Ue = e), n && ze().forEach(Je)),
      n
        ? Ge()
        : (function (e) {
            var n = document;
            "complete" === n.readyState ||
            ("loading" !== n.readyState && !n.documentElement.doScroll)
              ? e()
              : (n.addEventListener("DOMContentLoaded", e),
                window.addEventListener("load", e));
          })(Ge);
  }
  function Qe(e) {
    (e ? [e] : ze()).forEach(function (e) {
      if (e.observer) {
        var n = e.observer;
        if ((n.paused++, !(n.paused > 1) && n.instance))
          n.instance.disconnect();
      } else e.observer = { paused: 1 };
    });
  }
  function Ke(e) {
    if (e) {
      var n = Ne(e);
      n && Qe(n);
    } else Qe();
  }
  function We(e) {
    (e ? [e] : ze()).forEach(function (e) {
      if (e.observer) {
        var n = e.observer;
        if (n.paused && (n.paused--, !n.paused)) {
          var t = "function" == typeof e.node ? e.node() : e.node;
          if (!t) return;
          n.instance ? Ve(e, t) : Ye(e);
        }
      } else Ye(e);
    });
  }
  function Xe(e) {
    if (e) {
      var n = Ne(e);
      n && We(n);
    } else We();
  }
  function Ze(e, n) {
    void 0 === n && (n = !1);
    var t = Re(e, n);
    return Ye(t), t;
  }
  function en(e) {
    var n = Ne(e);
    n &&
      (Je(n),
      (function (e) {
        Le = Le.filter(function (n) {
          var t = "function" == typeof n.node ? n.node() : n.node;
          return e !== t;
        });
      })(e));
  }
  var nn = [];
  function tn(e) {
    return "string" == typeof e && (e = u(e)), null !== e && s(e) ? e : null;
  }
  function rn(e) {
    var n = [];
    nn.forEach(function (t) {
      var r = t.find(e);
      Array.prototype.forEach.call(r, function (e) {
        var r = e;
        if (void 0 === r[Ce] || r[Ce] === t) {
          var i = tn(t.name(r));
          if (null !== i) {
            r[Ce] = t;
            var o = { element: r, finder: t, name: i };
            n.push(o);
          }
        }
      });
    });
    var t = e.querySelectorAll("svg.iconify");
    return (
      Array.prototype.forEach.call(t, function (e) {
        var t = e,
          r = t[Ce],
          i = t[_e];
        if (r && i) {
          var o = tn(r.name(t));
          if (null !== o) {
            var a,
              c = !1;
            if (
              (o.prefix !== i.name.prefix || o.name !== i.name.name
                ? (c = !0)
                : ((a = r.customisations(t)),
                  (function (e, n) {
                    var t = Object.keys(e),
                      r = Object.keys(n);
                    if (t.length !== r.length) return !1;
                    for (var i = 0; i < t.length; i++) {
                      var o = t[i];
                      if (n[o] !== e[o]) return !1;
                    }
                    return !0;
                  })(i.customisations, a) || (c = !0)),
              c)
            ) {
              var f = { element: t, finder: r, name: o, customisations: a };
              n.push(f);
            }
          }
        }
      }),
      n
    );
  }
  var on = !1;
  function an() {
    on ||
      ((on = !0),
      setTimeout(function () {
        on && ((on = !1), cn());
      }));
  }
  function cn(e, n) {
    void 0 === n && (n = !1), (on = !1);
    var t = Object.create(null);
    (e ? [e] : ze()).forEach(function (e) {
      var r = "function" == typeof e.node ? e.node() : e.node;
      if (r && r.querySelectorAll) {
        var i = !1,
          o = !1;
        rn(r).forEach(function (n) {
          var r,
            a,
            c = n.element,
            f = n.name,
            u = f.provider,
            s = f.prefix,
            l = f.name,
            v = c[_e];
          if (
            void 0 !== v &&
            ((r = v.name),
            (a = f),
            null !== r &&
              null !== a &&
              r.name === a.name &&
              r.prefix === a.prefix)
          )
            switch (v.status) {
              case "missing":
                return;
              case "loading":
                if (Te({ provider: u, prefix: s, name: l }))
                  return void (i = !0);
            }
          var d = p(u, s);
          if (void 0 === d.icons[l]) {
            if (d.missing[l])
              return (
                (v = { name: f, status: "missing", customisations: {} }),
                void (c[_e] = v)
              );
            if (!Te({ provider: u, prefix: s, name: l })) {
              void 0 === t[u] && (t[u] = Object.create(null));
              var h = t[u];
              void 0 === h[s] && (h[s] = Object.create(null)), (h[s][l] = !0);
            }
            (v = { name: f, status: "loading", customisations: {} }),
              (c[_e] = v),
              (i = !0);
          } else {
            !o && e.observer && (Qe(e), (o = !0));
            var m =
              void 0 !== n.customisations
                ? n.customisations
                : n.finder.customisations(c);
            De(n, m, g(d, l));
          }
        }),
          e.temporary && !i
            ? en(r)
            : n && i
            ? Ze(r, !0)
            : o && e.observer && We(e);
      }
    }),
      Object.keys(t).forEach(function (e) {
        var n = t[e];
        Object.keys(n).forEach(function (t) {
          Fe(
            Object.keys(n[t]).map(function (n) {
              return { provider: e, prefix: t, name: n };
            }),
            an
          );
        });
      });
  }
  var fn = /[\s,]+/;
  function un(e, n) {
    return e.hasAttribute(n);
  }
  function sn(e, n) {
    return e.getAttribute(n);
  }
  var ln = ["inline", "hFlip", "vFlip"],
    vn = ["width", "height"],
    dn = "iconify-inline",
    pn = {
      find: function (e) {
        return e.querySelectorAll(
          "i.iconify, span.iconify, i.iconify-inline, span.iconify-inline"
        );
      },
      name: function (e) {
        return un(e, "data-icon") ? sn(e, "data-icon") : null;
      },
      customisations: function (e, n) {
        void 0 === n && (n = { inline: !1 });
        var t,
          r = n,
          i = e.getAttribute("class");
        if (
          (-1 !== (i ? i.split(/\s+/) : []).indexOf(dn) && (r.inline = !0),
          un(e, "data-rotate"))
        ) {
          var o = (function (e, n) {
            void 0 === n && (n = 0);
            var t = e.replace(/^-?[0-9.]*/, "");
            function r(e) {
              for (; e < 0; ) e += 4;
              return e % 4;
            }
            if ("" === t) {
              var i = parseInt(e);
              return isNaN(i) ? 0 : r(i);
            }
            if (t !== e) {
              var o = 0;
              switch (t) {
                case "%":
                  o = 25;
                  break;
                case "deg":
                  o = 90;
              }
              if (o) {
                var a = parseFloat(e.slice(0, e.length - t.length));
                return isNaN(a) ? 0 : (a /= o) % 1 == 0 ? r(a) : 0;
              }
            }
            return n;
          })(sn(e, "data-rotate"));
          o && (r.rotate = o);
        }
        return (
          un(e, "data-flip") &&
            ((t = r),
            sn(e, "data-flip")
              .split(fn)
              .forEach(function (e) {
                switch (e.trim()) {
                  case "horizontal":
                    t.hFlip = !0;
                    break;
                  case "vertical":
                    t.vFlip = !0;
                }
              })),
          un(e, "data-align") &&
            (function (e, n) {
              n.split(fn).forEach(function (n) {
                var t = n.trim();
                switch (t) {
                  case "left":
                  case "center":
                  case "right":
                    e.hAlign = t;
                    break;
                  case "top":
                  case "middle":
                  case "bottom":
                    e.vAlign = t;
                    break;
                  case "slice":
                  case "crop":
                    e.slice = !0;
                    break;
                  case "meet":
                    e.slice = !1;
                }
              });
            })(r, sn(e, "data-align")),
          ln.forEach(function (n) {
            if (un(e, "data-" + n)) {
              var t = (function (e, n) {
                var t = e.getAttribute(n);
                return (
                  t === n || "true" === t || ("" !== t && "false" !== t && null)
                );
              })(e, "data-" + n);
              "boolean" == typeof t && (r[n] = t);
            }
          }),
          vn.forEach(function (n) {
            if (un(e, "data-" + n)) {
              var t = sn(e, "data-" + n);
              "" !== t && (r[n] = t);
            }
          }),
          r
        );
      },
      classFilter: function (e) {
        var n = [];
        return (
          e.forEach(function (e) {
            "iconify" !== e &&
              "" !== e &&
              "iconify--" !== e.slice(0, 9) &&
              n.push(e);
          }),
          n
        );
      },
    };
  function hn(e, n, t) {
    var r = b(e);
    return r
      ? De({ name: u(e) }, I(E, "object" == typeof n ? n : {}), r, t)
      : null;
  }
  function gn() {
    return "2.2.1";
  }
  function mn(e, n) {
    return hn(e, n, !1);
  }
  function yn(e, n) {
    return hn(e, n, !0);
  }
  function bn(e, n) {
    var t = b(e);
    return t ? T(t, I(E, "object" == typeof n ? n : {})) : null;
  }
  function xn(e) {
    e
      ? (function (e) {
          var n = Ne(e);
          n ? cn(n) : cn({ node: e, temporary: !0 }, !0);
        })(e)
      : cn();
  }
  if ("undefined" != typeof document && "undefined" != typeof window) {
    !(function () {
      if (document.documentElement) return Re(document.documentElement);
      Le.push({
        node: function () {
          return document.documentElement;
        },
      });
    })(),
      (function (e) {
        -1 === nn.indexOf(e) && nn.push(e);
      })(pn);
    var jn = window;
    if (void 0 !== jn.IconifyPreload) {
      var wn = jn.IconifyPreload,
        On = "Invalid IconifyPreload syntax.";
      "object" == typeof wn &&
        null !== wn &&
        (wn instanceof Array ? wn : [wn]).forEach(function (e) {
          try {
            ("object" != typeof e ||
              null === e ||
              e instanceof Array ||
              "object" != typeof e.icons ||
              "string" != typeof e.prefix ||
              !j(e)) &&
              console.error(On);
          } catch (e) {
            console.error(On);
          }
        });
    }
    setTimeout(function () {
      Be(cn), cn();
    });
  }
  function En(e, n) {
    W(e, !1 !== n);
  }
  function In(e) {
    W(e, !0);
  }
  if (
    (Z("", le), "undefined" != typeof document && "undefined" != typeof window)
  ) {
    (K.store = function (e, n) {
      function t(t) {
        if (!q[t]) return !1;
        var r = G(t);
        if (!r) return !1;
        var i = V[t].shift();
        if (void 0 === i && !J(r, t, (i = H[t]) + 1)) return !1;
        try {
          var o = { cached: Math.floor(Date.now() / U), provider: e, data: n };
          r.setItem(N + i.toString(), JSON.stringify(o));
        } catch (e) {
          return !1;
        }
        return !0;
      }
      $ || Q(),
        Object.keys(n.icons).length &&
          (n.not_found && delete (n = Object.assign({}, n)).not_found,
          t("local") || t("session"));
    }),
      Q();
    var Sn = window;
    if (void 0 !== Sn.IconifyProviders) {
      var kn = Sn.IconifyProviders;
      if ("object" == typeof kn && null !== kn)
        for (var An in kn) {
          var Mn = "IconifyProviders[" + An + "] is invalid.";
          try {
            var Tn = kn[An];
            if ("object" != typeof Tn || !Tn || void 0 === Tn.resources)
              continue;
            oe(An, Tn) || console.error(Mn);
          } catch (e) {
            console.error(Mn);
          }
        }
    }
  }
  var Fn = {
      getAPIConfig: ae,
      setAPIModule: Z,
      sendAPIQuery: je,
      setFetch: function (e) {
        se = e;
      },
      getFetch: function () {
        return se;
      },
      listAPIProviders: function () {
        return Object.keys(te);
      },
      mergeParams: ce,
    },
    Pn = {
      _api: Fn,
      addAPIProvider: oe,
      loadIcons: Fe,
      loadIcon: Pe,
      iconExists: w,
      getIcon: O,
      listIcons: m,
      addIcon: x,
      addCollection: j,
      shareStorage: d,
      replaceIDs: D,
      calculateSize: A,
      buildIcon: F,
      getVersion: gn,
      renderSVG: mn,
      renderHTML: yn,
      renderIcon: bn,
      scan: xn,
      observe: Ze,
      stopObserving: en,
      pauseObserver: Ke,
      resumeObserver: Xe,
      enableCache: En,
      disableCache: In,
    };
  return (
    (e._api = Fn),
    (e.addAPIProvider = oe),
    (e.addCollection = j),
    (e.addIcon = x),
    (e.buildIcon = F),
    (e.calculateSize = A),
    (e.default = Pn),
    (e.disableCache = In),
    (e.enableCache = En),
    (e.getIcon = O),
    (e.getVersion = gn),
    (e.iconExists = w),
    (e.listIcons = m),
    (e.loadIcon = Pe),
    (e.loadIcons = Fe),
    (e.observe = Ze),
    (e.pauseObserver = Ke),
    (e.renderHTML = yn),
    (e.renderIcon = bn),
    (e.renderSVG = mn),
    (e.replaceIDs = D),
    (e.resumeObserver = Xe),
    (e.scan = xn),
    (e.shareStorage = d),
    (e.stopObserving = en),
    Object.defineProperty(e, "__esModule", { value: !0 }),
    e
  );
})({});
if ("object" == typeof exports)
  try {
    for (var key in ((exports.__esModule = !0),
    (exports.default = Iconify),
    Iconify))
      exports[key] = Iconify[key];
  } catch (e) {}
try {
  void 0 === self.Iconify && (self.Iconify = Iconify);
} catch (e) {}
