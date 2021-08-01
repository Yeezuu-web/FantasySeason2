<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Fantasy Season 2</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css"
        rel="stylesheet" />
    <link href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet" />
    <link href="{{ asset('dist/css/adminlte.min.css') }}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;500&display=swap" rel="stylesheet">
    <link href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/custom1.css') }}" rel="stylesheet" />
    @yield('styles')
</head>

<body class="layout-fixed" style="height: auto;">
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <img class="banner" src="{{ asset('dist/img/FantasySeason2BannerWebsite.jpg') }}" alt="banner">
                </div>
                <div class="col-md-10 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-md-4 mx-auto mb-3 title-form">
                                <p class="kh">ទម្រង់ចុះឈ្មោះ</p>
                            </div>
                            <div class="col-md-12">
                                <form action="">
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-group">
                                                <label for="name" class="required kh mb-0">គោត្តនាម​ និងនាម</label>
                                                <p>Manger Name</p>
                                                <input class="form-control" type="text" name="" id="" placeholder="គោត្តនាម​ និងនាម / Manager Name">
                                            </div>
                                            <div class="form-group">
                                                <label for="team_name" class="required kh mb-0">ឈ្មោះក្រុម</label>
                                                <p>Team Name</p>
                                                <input class="form-control" type="text" name="" id="" placeholder="ឈ្មោះក្រុម">
                                            </div>
                                            <div class="form-group">
                                                <label for="dob" class="required kh mb-0">ថ្ងៃខែឆ្នាំកំណើត</label>
                                                <p>Day of birth</p>
                                                <input class="form-control" type="date" name="" id="" placeholder="ថ្ងៃខែឆ្នាំកំណើត">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group" style="margin-bottom: 1.8rem;">
                                                <label for="gender" class="required kh mb-0">ភេទ</label>
                                                <p>Gender</p>
                                                <div class="icheck-primary d-inline" style="margin-right: 15px;">
                                                    <input type="radio" id="radioPrimary1" name="r1">
                                                    <label for="radioPrimary1"​ class="kh1">
                                                        ប្រុស
                                                    </label>
                                                </div>
                                                <div class="icheck-primary d-inline" style="margin-right: 15px;">
                                                    <input type="radio" id="radioPrimary2" name="r1">
                                                    <label for="radioPrimary2" class="kh1">
                                                        ស្រី
                                                    </label>
                                                </div>
                                                <div class="icheck-primary d-inline" style="margin-right: 15px;">
                                                    <input type="radio" id="radioPrimary3" name="r1">
                                                    <label for="radioPrimary3" class="kh1">
                                                        មិនព័ណ៍នា
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="favorite_team" class="required kh mb-0">ក្លឹបគាំទ្រ</label>
                                                <p>Favorite Team</p>
                                                <select class="form-control">
                                                    <option value="">Select Favorite Team</option>
                                                    <option value="">Select Favorite Team</option>
                                                    <option value="">Select Favorite Team</option>
                                                    <option value="">Select Favorite Team</option>
                                                    <option value="">Select Favorite Team</option>
                                                    <option value="">Select Favorite Team</option>
                                                    <option value="">Select Favorite Team</option>
                                                    <option value="">Select Favorite Team</option>
                                                    <option value="">Select Favorite Team</option>
                                                    <option value="">Select Favorite Team</option>
                                                    <option value="">Select Favorite Team</option>
                                                    <option value="">Select Favorite Team</option>
                                                    <option value="">Select Favorite Team</option>
                                                    <option value="">Select Favorite Team</option>
                                                    <option value="">Select Favorite Team</option>
                                                    <option value="">Select Favorite Team</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="email" class="required kh mb-0">អ៊ីម៉ែល</label>
                                                <p>Email</p>
                                                <input class="form-control" type="email" name="" id="" placeholder="អ៊ីម៉ែល">
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <p class="text-danger mb-3 khmer-title"><strong>*</strong>លក្ខន្តិកៈ</p>
                                            <ul>
                                                <li>1. អ្នកចូលរួមលេង ត្រូវមានសញ្ជាតិខ្មែរ និងមានអាយុចាប់ពី <strong class="text-danger">១២ឆ្នាំ</strong>ឡើងទៅ</li>
                                                <li>2. អ្នកចូលរួមលេង ត្រូវមានគណនីតែ <strong class="text-danger">មួយ(១)</strong>ប៉ុណ្ណោះក្នុង <strong style="font-weight: 500; font-family: 'Roboto', sans-serif;">CBS Fantasy League</strong></li>
                                                <li>3. អ្នកឈ្នះ ត្រូវមកទទួលរង្វាន់ដោយផ្ទាល់ និងបង្ហាញខ្លួនក្នុងកម្មវិធី <strong class="text-danger" style="font-weight: 500; font-family: 'Roboto', sans-serif;">CBS Fantasy League</strong></li>
                                                <li>4. អ្នកចូលរួមលេង មានសិទ្ធឈ្នះរង្វាន់ប្រចាំសប្តាហ៍ច្រើនដងដោយមិនកំណត់ចំនួនដងលើយ</li>
                                                <li>5. អ្នកចូលរួមលេងគ្រប់រូបមានសិទ្ធឈ្នះរង្វាន់ធំប្រចាំឆ្នាំ វៀរលែងតែបុគ្គលិក <strong class="text-danger" style="font-weight: 500; font-family: 'Roboto', sans-serif;">CBS</strong> ប៉ុណ្ណោះ</li>
                                                <li>6. អ្នកចូលរួមលេង ត្រូវចុះឈ្មោះដោយប្រើ​ <strong class="text-danger">ឈ្មោះពិត</strong> និងដាក់ឈ្មោះក្រុម
                                                    ​ឱ្យបានត្រឹមត្រូវដោយមិនប៉ះពាល់ដល់សេចក្តីថ្លៃថ្នូរបស់សង្គម</li>
                                                <li>7. <strong class="text-danger" style="font-weight: 500; font-family: 'Roboto', sans-serif;">CBS Fantasy</strong>​ មានសិទ្ធលុបចោល និងមិនផ្តល់រង្វាន់ដល់គណនីណាដែលមិនគោរពតាមលក្ខន្តិកៈ ហើយជ្រើសរើសអ្នកដែលមានពិន្ទុខ្ពស់បន្ទាប់ដែលបានគោរពលក្ខន្តិកៈមកជំនួស។</li>
                                            </ul>
                                            <div class="col-md-10 mx-auto">
                                                <p class="note"><strong class="text-danger​" style="font-weight: 500; font-family: 'Roboto', sans-serif;">CBS</strong>​ ​រក្សាសិទ្ធក្នុងការកែប្រែលក្ខន្តិកៈទាំងអស់ខាងលើដោយពុំចាំបាច់ជម្រាបជូនដំណឹងជាមុន!</p>
                                            </div>
                                        </div>
                                        <div class="col-md-12 text-center" style="">
                                            <button class="btn btn-lg btn-danger​ btn-kh">ចុះឈ្មោះ</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- <script src="{{ asset('plugins/popper/popper.min.js') }}"></script> -->
    <!-- <script src="{{ asset('dist/js/adminlte.min.js') }}"></script> -->
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js">
    </script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('plugins/sweetalert2/sweetalert2/sweetalert2@10.js') }}"></script>
    <script>
        $(document).ready(function () {
            $(".notifications-menu").on('click', function () {
                if (!$(this).hasClass('open')) {
                    $('.notifications-menu .label-warning').hide();
                    $.get('/admin/user-alerts/read');
                }
            });
        });

    </script>
    <script>
        /*!
         * AdminLTE v3.0.0-alpha.2 (https://adminlte.io)
         * Copyright 2014-2018 Abdullah Almsaeed <abdullah@almsaeedstudio.com>
         * Licensed under MIT (https://github.com/almasaeed2010/AdminLTE/blob/master/LICENSE)
         */
        ! function (e, t) {
            "object" == typeof exports && "undefined" != typeof module ? t(exports) : "function" == typeof define &&
                define.amd ? define(["exports"], t) : t(e.adminlte = {})
        }(this, function (e) {
            "use strict";
            var i, t, o, n, r, a, s, c, f, l, u, d, h, p, _, g, y, m, v, C, D, E, A, O, w, b, L, S, j, T, I, Q, R,
                P, x, B, M, k, H, N, Y, U, V, G, W, X, z, F, q, J, K, Z, $, ee, te, ne = "function" ==
                typeof Symbol && "symbol" == typeof Symbol.iterator ? function (e) {
                    return typeof e
                } : function (e) {
                    return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ?
                        "symbol" : typeof e
                },
                ie = function (e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                },
                oe = (i = jQuery, t = "ControlSidebar", o = "lte.control.sidebar", n = i.fn[t], r =
                    ".control-sidebar", a = '[data-widget="control-sidebar"]', s = ".main-header", c =
                    "control-sidebar-open", f = "control-sidebar-slide-open", l = {
                        slide: !0
                    }, u = function () {
                        function n(e, t) {
                            ie(this, n), this._element = e, this._config = this._getConfig(t)
                        }
                        return n.prototype.show = function () {
                            this._config.slide ? i("body").removeClass(f) : i("body").removeClass(c)
                        }, n.prototype.collapse = function () {
                            this._config.slide ? i("body").addClass(f) : i("body").addClass(c)
                        }, n.prototype.toggle = function () {
                            this._setMargin(), i("body").hasClass(c) || i("body").hasClass(f) ? this.show() :
                                this.collapse()
                        }, n.prototype._getConfig = function (e) {
                            return i.extend({}, l, e)
                        }, n.prototype._setMargin = function () {
                            i(r).css({
                                top: i(s).outerHeight()
                            })
                        }, n._jQueryInterface = function (t) {
                            return this.each(function () {
                                var e = i(this).data(o);
                                if (e || (e = new n(this, i(this).data()), i(this).data(o, e)),
                                    "undefined" === e[t]) throw new Error(t + " is not a function");
                                e[t]()
                            })
                        }, n
                    }(), i(document).on("click", a, function (e) {
                        e.preventDefault(), u._jQueryInterface.call(i(this), "toggle")
                    }), i.fn[t] = u._jQueryInterface, i.fn[t].Constructor = u, i.fn[t].noConflict = function () {
                        return i.fn[t] = n, u._jQueryInterface
                    }, u),
                re = (d = jQuery, h = "Layout", p = "lte.layout", _ = d.fn[h], g = ".main-sidebar", y =
                    ".main-header", m = ".content-wrapper", v = ".main-footer", C = "hold-transition", D =
                    function () {
                        function n(e) {
                            ie(this, n), this._element = e, this._init()
                        }
                        return n.prototype.fixLayoutHeight = function () {
                            var e = {
                                    window: d(window).height(),
                                    header: d(y).outerHeight(),
                                    footer: d(v).outerHeight(),
                                    sidebar: d(g).height()
                                },
                                t = this._max(e);
                            d(m).css("min-height", e.window - e.header - e.footer), d(g).css("min-height", e
                                .window - e.header)
                        }, n.prototype._init = function () {
                            var e = this;
                            d("body").removeClass(C), this.fixLayoutHeight(), d(g).on(
                                "collapsed.lte.treeview expanded.lte.treeview collapsed.lte.pushmenu expanded.lte.pushmenu",
                                function () {
                                    e.fixLayoutHeight()
                                }), d(window).resize(function () {
                                e.fixLayoutHeight()
                            }), d("body, html").css("height", "auto")
                        }, n.prototype._max = function (t) {
                            var n = 0;
                            return Object.keys(t).forEach(function (e) {
                                t[e] > n && (n = t[e])
                            }), n
                        }, n._jQueryInterface = function (t) {
                            return this.each(function () {
                                var e = d(this).data(p);
                                e || (e = new n(this), d(this).data(p, e)), t && e[t]()
                            })
                        }, n
                    }(), d(window).on("load", function () {
                        D._jQueryInterface.call(d("body"))
                    }), d.fn[h] = D._jQueryInterface, d.fn[h].Constructor = D, d.fn[h].noConflict = function () {
                        return d.fn[h] = _, D._jQueryInterface
                    }, D),
                ae = (E = jQuery, A = "PushMenu", w = "." + (O = "lte.pushmenu"), b = E.fn[A], L = {
                    COLLAPSED: "collapsed" + w,
                    SHOWN: "shown" + w
                }, S = {
                    screenCollapseSize: 768
                }, j = {
                    TOGGLE_BUTTON: '[data-widget="pushmenu"]',
                    SIDEBAR_MINI: ".sidebar-mini",
                    SIDEBAR_COLLAPSED: ".sidebar-collapse",
                    BODY: "body",
                    OVERLAY: "#sidebar-overlay",
                    WRAPPER: ".wrapper"
                }, T = "sidebar-collapse", I = "sidebar-open", Q = function () {
                    function n(e, t) {
                        ie(this, n), this._element = e, this._options = E.extend({}, S, t), E(j.OVERLAY)
                            .length || this._addOverlay()
                    }
                    return n.prototype.show = function () {
                        E(j.BODY).addClass(I).removeClass(T);
                        var e = E.Event(L.SHOWN);
                        E(this._element).trigger(e)
                    }, n.prototype.collapse = function () {
                        E(j.BODY).removeClass(I).addClass(T);
                        var e = E.Event(L.COLLAPSED);
                        E(this._element).trigger(e)
                    }, n.prototype.toggle = function () {
                        (E(window).width() >= this._options.screenCollapseSize ? !E(j.BODY).hasClass(T) : E(
                            j.BODY).hasClass(I)) ? this.collapse(): this.show()
                    }, n.prototype._addOverlay = function () {
                        var e = this,
                            t = E("<div />", {
                                id: "sidebar-overlay"
                            });
                        t.on("click", function () {
                            e.collapse()
                        }), E(j.WRAPPER).append(t)
                    }, n._jQueryInterface = function (t) {
                        return this.each(function () {
                            var e = E(this).data(O);
                            e || (e = new n(this), E(this).data(O, e)), t && e[t]()
                        })
                    }, n
                }(), E(document).on("click", j.TOGGLE_BUTTON, function (e) {
                    e.preventDefault();
                    var t = e.currentTarget;
                    "pushmenu" !== E(t).data("widget") && (t = E(t).closest(j.TOGGLE_BUTTON)), Q
                        ._jQueryInterface.call(E(t), "toggle")
                }), E.fn[A] = Q._jQueryInterface, E.fn[A].Constructor = Q, E.fn[A].noConflict = function () {
                    return E.fn[A] = b, Q._jQueryInterface
                }, Q),
                se = (R = jQuery, P = "Treeview", B = "." + (x = "lte.treeview"), M = R.fn[P], k = {
                    SELECTED: "selected" + B,
                    EXPANDED: "expanded" + B,
                    COLLAPSED: "collapsed" + B,
                    LOAD_DATA_API: "load" + B
                }, H = ".nav-item", N = ".nav-treeview", Y = ".menu-open", V = "menu-open", G = {
                    trigger: (U = '[data-widget="treeview"]') + " " + ".nav-link",
                    animationSpeed: 300,
                    accordion: !0
                }, W = function () {
                    function i(e, t) {
                        ie(this, i), this._config = t, this._element = e
                    }
                    return i.prototype.init = function () {
                        this._setupListeners()
                    }, i.prototype.expand = function (e, t) {
                        var n = this,
                            i = R.Event(k.EXPANDED);
                        if (this._config.accordion) {
                            var o = t.siblings(Y).first(),
                                r = o.find(N).first();
                            this.collapse(r, o)
                        }
                        e.slideDown(this._config.animationSpeed, function () {
                            t.addClass(V), R(n._element).trigger(i)
                        })
                    }, i.prototype.collapse = function (e, t) {
                        var n = this,
                            i = R.Event(k.COLLAPSED);
                        e.slideUp(this._config.animationSpeed, function () {
                            t.removeClass(V), R(n._element).trigger(i), e.find(Y + " > " + N)
                                .slideUp(), e.find(Y).removeClass(V)
                        })
                    }, i.prototype.toggle = function (e) {
                        var t = R(e.currentTarget),
                            n = t.next();
                        if (n.is(N)) {
                            e.preventDefault();
                            var i = t.parents(H).first();
                            i.hasClass(V) ? this.collapse(R(n), i) : this.expand(R(n), i)
                        }
                    }, i.prototype._setupListeners = function () {
                        var t = this;
                        R(document).on("click", this._config.trigger, function (e) {
                            t.toggle(e)
                        })
                    }, i._jQueryInterface = function (n) {
                        return this.each(function () {
                            var e = R(this).data(x),
                                t = R.extend({}, G, R(this).data());
                            e || (e = new i(R(this), t), R(this).data(x, e)), "init" === n && e[n]()
                        })
                    }, i
                }(), R(window).on(k.LOAD_DATA_API, function () {
                    R(U).each(function () {
                        W._jQueryInterface.call(R(this), "init")
                    })
                }), R.fn[P] = W._jQueryInterface, R.fn[P].Constructor = W, R.fn[P].noConflict = function () {
                    return R.fn[P] = M, W._jQueryInterface
                }, W),
                ce = (X = jQuery, z = "Widget", q = "." + (F = "lte.widget"), J = X.fn[z], K = {
                    EXPANDED: "expanded" + q,
                    COLLAPSED: "collapsed" + q,
                    REMOVED: "removed" + q
                }, $ = "collapsed-card", ee = {
                    animationSpeed: "normal",
                    collapseTrigger: (Z = {
                        DATA_REMOVE: '[data-widget="remove"]',
                        DATA_COLLAPSE: '[data-widget="collapse"]',
                        CARD: ".card",
                        CARD_HEADER: ".card-header",
                        CARD_BODY: ".card-body",
                        CARD_FOOTER: ".card-footer",
                        COLLAPSED: ".collapsed-card"
                    }).DATA_COLLAPSE,
                    removeTrigger: Z.DATA_REMOVE
                }, te = function () {
                    function n(e, t) {
                        ie(this, n), this._element = e, this._parent = e.parents(Z.CARD).first(), this
                            ._settings = X.extend({}, ee, t)
                    }
                    return n.prototype.collapse = function () {
                        var e = this;
                        this._parent.children(Z.CARD_BODY + ", " + Z.CARD_FOOTER).slideUp(this._settings
                            .animationSpeed,
                            function () {
                                e._parent.addClass($)
                            });
                        var t = X.Event(K.COLLAPSED);
                        this._element.trigger(t, this._parent)
                    }, n.prototype.expand = function () {
                        var e = this;
                        this._parent.children(Z.CARD_BODY + ", " + Z.CARD_FOOTER).slideDown(this._settings
                            .animationSpeed,
                            function () {
                                e._parent.removeClass($)
                            });
                        var t = X.Event(K.EXPANDED);
                        this._element.trigger(t, this._parent)
                    }, n.prototype.remove = function () {
                        this._parent.slideUp();
                        var e = X.Event(K.REMOVED);
                        this._element.trigger(e, this._parent)
                    }, n.prototype.toggle = function () {
                        this._parent.hasClass($) ? this.expand() : this.collapse()
                    }, n.prototype._init = function (e) {
                        var t = this;
                        this._parent = e, X(this).find(this._settings.collapseTrigger).click(function () {
                            t.toggle()
                        }), X(this).find(this._settings.removeTrigger).click(function () {
                            t.remove()
                        })
                    }, n._jQueryInterface = function (t) {
                        return this.each(function () {
                            var e = X(this).data(F);
                            e || (e = new n(X(this), e), X(this).data(F, "string" == typeof t ? e :
                                    t)), "string" == typeof t && t.match(/remove|toggle/) ? e[t]() :
                                "object" === ("undefined" == typeof t ? "undefined" : ne(t)) && e
                                ._init(X(this))
                        })
                    }, n
                }(), X(document).on("click", Z.DATA_COLLAPSE, function (e) {
                    e && e.preventDefault(), te._jQueryInterface.call(X(this), "toggle")
                }), X(document).on("click", Z.DATA_REMOVE, function (e) {
                    e && e.preventDefault(), te._jQueryInterface.call(X(this), "remove")
                }), X.fn[z] = te._jQueryInterface, X.fn[z].Constructor = te, X.fn[z].noConflict = function () {
                    return X.fn[z] = J, te._jQueryInterface
                }, te);
            e.ControlSidebar = oe, e.Layout = re, e.PushMenu = ae, e.Treeview = se, e.Widget = ce, Object
                .defineProperty(e, "__esModule", {
                    value: !0
                })
        });
        //# sourceMappingURL=adminlte.min.js.map

    </script>
    @yield('scripts')
</body>

</html>
