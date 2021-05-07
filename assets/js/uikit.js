window.onload = function() {
    BxAnimAuto();
    initAnimationBx();
    scrollCallFunction();
    js_btnBurgerClicked();
    js_scrollAnimMenu(250);
    if ($('._hektorAdaptLogicielImmobilierContainer').length > 0) {
        js_HektorAdapt();
    }
    js_DiffusionPortails();
    js_headerMenuMobile();
    js_SliderWebmark();
    jsScrollTo();
    js_CallPopin();
    if ($('._presentationLogicielLogicielImmobilierContainer').length > 0) {
        js_PresentationLogiciel();
    }
};

function addRemoveClass(element, classe) {
    if (element.hasClass(classe)) {
        element.removeClass(classe);
    } else {
        element.addClass(classe);
    }
}

// -------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------
// JS BTN BURGER CLICKED

function js_btnBurgerClicked() {
    let menu = $('.headerContainer .menuStructure');
    $('.js_btnBurger').on('click', function() {
        addRemoveClass(menu, 'active');
        addRemoveClass($('body'), 'noScroll');
        addRemoveClass($(this), 'active');
    });
}

// -------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------
// JS SCROOL MENU

function js_scrollAnimMenu(val) {
    $(window).on('scroll', function() {
        initMenuFixed(val);
    });
}

function initMenuFixed(val) {
    if (scrollTopLimitFunction(val)) {
        $('.headerContainer').addClass('fixedMenu');
    } else {
        $('.headerContainer').removeClass('fixedMenu');
    }
}

function scrollTopLimitFunction(limit) {
    return window.scrollY > limit;
}

// -------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------
// JS SCROLL TO

function jsScrollTo() {
    $('.js_scrollTo').on('click', function() {
        let anchor = $(this).attr('data-url');
        let value = parseInt($(this).attr('data-position-value'));
        let res = parseInt((value) + $('#' + anchor).offset().top);
        $('html, body').animate({ scrollTop: res }, 1000);
        return false;
    });
}

// -------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------
// // HEKTOR ADAPT SLIDER

function js_HektorAdapt() {
    let slider = new js_HektorAdaptFunction({
        root: $('._hektorAdaptLogicielImmobilierContainer')
    });
}

function js_HektorAdaptFunction(params) {
    let that = this;
    this.params = params;
    let $this = this.params.root;

    this.clickedBtn = function() {
        $('.js_btnMenu').each(function() {
            $(this).on('click', function() {
                let id = $(this).attr('data-id');
                $('.js_btnMenu').removeClass('active');
                $('.listItemContent').removeClass('active');
                $(this).addClass('active');
                $('#' + id).addClass('active');
            });
        });
    }

    this.clickedBtn();

}

// -------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------
// // HEKTOR ADAPT SLIDER

function js_DiffusionPortails() {
    $('.moduleDefault._diffusionPortailsGestionBiensContainer').each(function() {
        let x = new js_DiffusionPortailsFunction({
            root: this
        });
    });
}

function js_DiffusionPortailsFunction(params) {
    let that = this;
    this.params = params;
    let $this = this.params.root;

    let item = $('#js_ContentMenuDiffusions .item', $this);
    let image = $('#js_ContentImageDiffusions .image', $this);

    this.clickedItem = function() {
        item.on('click', function() {
            let valueId = $(this).attr('data-value-id');
            image.removeClass('active');
            item.removeClass('active');
            $('#' + valueId).addClass('active');
            $(this).addClass('active');
        });
    };

    this.clickedItem();

}

// -------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------
// // HEADER MENU MOBILE

function js_headerMenuMobile() {
    $('.headerContainer').each(function() {
        let x = new js_headerMenuMobileFunction({
            root: this
        });
    });
}

function js_headerMenuMobileFunction(params) {
    let that = this;
    this.params = params;
    let $this = this.params.root;

    let $nav = $('.navigationStructure ', $this);
    let $menu = $('.element ', $nav);
    let $height = 0;
    let $window = $(window).innerWidth();

    this.openSousMenu = function() {
        let limit = 1080;
        $menu.on('click', function() {
            if ($window < limit) {
                if ($('.elementStructure', $(this)).length > 0) {
                    $height = $('.elementContent', $(this)).innerHeight();
                    if ($(this).hasClass('active')) {
                        $(this).removeClass('active');
                        $('.elementStructure', $this).css('height', 0);
                    } else {
                        $('.element', $this).removeClass('active');
                        $(this).addClass('active');
                        $('.elementStructure', $this).css('height', 0);
                        $('.elementStructure', $(this)).css('height', $height);
                    }
                }
            }
        });
    };

    this.resizeWindowInitData = function() {
        $(window).on('resize', function() {
            $window = $(window).innerWidth();
            $('.element', $this).removeClass('active');
            $('.elementStructure', $this).removeAttr('style');
        });
    };

    this.resizeWindowInitData();
    this.openSousMenu();

}

// -------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------
// ANIMBX AUTO

// function BxAnimAuto() {
//     $('.BxAnimPage').each(function() {
//         let item = new BxAnimAutoFunction({
//             root: $(this)
//         });
//     });
// }

// function BxAnimAutoFunction(params) {
//     let that = this;
//     this.params = params;
//     let $this = this.params.root;

//     let $verifActivate = [];
//     let $classAdd = [];
//     let $classRemove = [];

//     this.initBxAnimPage = function() {
//         $('.BxAnim', $this).each(function(i) {
//             let classes = $(this).attr('class').split(' ').filter(classe => classe.match('__Out')).toString();
//             $verifActivate[i] = false;
//             $classRemove[i] = classes;
//             $classAdd[i] = classes.split('__').splice(0, 1).toString();
//             $(this).addClass('transition500');
//             $(this).addClass('BxAnim_' + i);
//             i++;
//         });
//         this.initActiveAnimation();
//         this.scrollActiveAnimation();
//     };

//     this.initActiveAnimation = async function() {
//         let offset = 0;
//         let bxAnimClass = 'BxAnim_';
//         let index = 0;
//         let Wtop = $(window).scrollTop();
//         let Wbottom = Wtop + $(window).height();
//         while (index < $verifActivate.length) {
//             if ($('.' + bxAnimClass + index).offset() != undefined) {
//                 offset = $('.' + bxAnimClass + index).offset().top + 100;
//                 if ($verifActivate[index] == false) {
//                     if (offset < Wbottom) {
//                         $verifActivate[index] = true;
//                         index = await activeAnimation(index, $('.' + bxAnimClass + index), $classRemove[index], $classAdd[index]);
//                     } else {
//                         index++;
//                     }
//                 } else {
//                     index++;
//                 }
//             }
//         }
//     };

//     this.scrollActiveAnimation = function() {
//         $(window).on('scroll', function(event) {
//             that.initActiveAnimation();
//         });
//     }

//     this.initBxAnimPage();
// }

// function activeAnimation(index, classeTarget, classRemove, classAdd) {
//     return new Promise(resolve => {
//         setTimeout(function() {
//             index++;
//             classeTarget.removeClass(classRemove);
//             classeTarget.addClass(classAdd);
//             resolve(index);
//         }, 250);
//     });
// }


function BxAnimAuto() {
    $('.BxAnimPage').each(function() {
        let item = new BxAnimAutoFunction({
            root: $(this)
        });
    });
}

function BxAnimAutoFunction(params) {
    let that = this;
    this.params = params;
    let $this = this.params.root;

    let animObject = [];
    let Wtop = 0;
    let Wbottom = 0;


    this.setInObject = function() {
        $('.BxAnim', $this).each(function(i) {
            let array = [];
            let classes = $(this).attr('class').split(' ').filter(classe => classe.match('__Out')).toString();
            // $(this).addClass($this.attr('data-transition'));
            $(this).addClass('BxAnim_' + i);
            array['number'] = 'BxAnim_' + i;
            array['offsetTop'] = $(this).offset().top;
            array['class'] = classes;
            array['classAcitve'] = classes.split('__').splice(0, 1).toString();
            array['activation'] = 0;
            animObject.push(array);
        });
        this.scrollActiveAnimation();
    }

    this.scrollActiveAnimation = function() {
        $(window).on('scroll', function(event) {
            that.choiceElement();
        });
    }

    this.choiceElement = function() {
        Wtop = $(window).scrollTop();
        Wbottom = Wtop + $(window).height();
        for (var item in animObject) {
            if (animObject[item]['offsetTop'] < Wbottom) {
                if (animObject[item]['activation'] < 1) {
                    animObject[item]['activation'] = 1;
                    if (animObject[item]['offsetTop'] < Wtop) {
                        timer = 0;
                    } else {
                        timer = 150;
                    }
                    that.activeAnim(item, timer);
                    break;
                } else {
                    break;
                }
            } else {
                break;
            }
        };
    };

    this.activeAnim = function(i, timer) {
        $('.' + animObject[i]['number']).removeClass(animObject[i]['class']);
        $('.' + animObject[i]['number']).addClass(animObject[i]['classAcitve']);
        setTimeout(function() {
            animObject.splice(0, 1);
            that.choiceElement();
        }, timer);
    };

    this.setInObject();
    this.choiceElement();

}

// -------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------
// // ANIMATION BX

function initAnimationBx() {
    applicateNewTimeLine($('.animBx'));
    initAnimBx($('.animBx'));
}

function scrollCallFunction() {
    $(window).on('scroll', function() {
        initAnimBx($('.animBx'));
    });
}

function applicateNewTimeLine(animBx) {
    animBx.parents(0).each(function() {
        var timeLine = 100;
        var newTimeLine = 0;

        if (initAnimTime($(this), 'data-animrepeat') == 'true') {
            $('.animBx', $(this)).each(function() {
                if (initAnimTime($(this), 'data-duration') != 0) {
                    timeLine = initAnimTime($(this), 'data-duration');
                }

                $(this).each(function() {
                    newTimeLine = parseFloat(newTimeLine) + parseFloat(timeLine);
                    $(this).attr('data-duration', newTimeLine);
                });
            });
        }
    });
}

function initAnimBx(animBx) {
    animBx.each(function() {
        var x = initAnimTime($(this).parents(0), 'data-activateanim');

        if ($(this).offset() != undefined) {
            if (x == "true") {
                var offset = 0;
                var Wbottom = 1;
            } else {
                var offset = $(this).offset().top;
                var Wtop = $(window).scrollTop();
                var Wbottom = Wtop + $(window).height();
            }

            var timeLine = initAnimTime($(this), 'data-duration');
            var animTime = initAnimTime($(this), 'data-animtime');
            var animName = initAnimTime($(this), 'data-animname');
            var animNameOut = animName + 'Out';
            applyAnim($(this), animName, animNameOut, timeLine, animTime, offset, Wbottom);
        }
    });
}

function initAnimTime(classTested, data) {
    if (classTested.attr(data)) {
        return classTested.attr(data);
    } else {
        return 0;
    }
}

function applyAnim(theClass, classTest, classTestOut, timeLine, animTime, offset, Wbottom) {
    if ($(window).innerWidth() < 980) {
        timeLine = 100;
    }

    if (offset < Wbottom) {
        setTimeout(function() {
            theClass.addClass(classTest);
            theClass.removeClass(classTestOut);
        }, timeLine);
    } else {
        if (animTime == 'true') {
            theClass.removeClass(classTest);
            theClass.addClass(classTestOut);
        }
    }
}

// -------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------
// // ANIMATION BX

function js_SliderWebmark() {
    let slider = new js_SliderWebmarkFunction({
        root: $('.js_SliderWebmark')
    });
}

function js_SliderWebmarkFunction(params) {
    let that = this;
    this.params = params;
    let $this = this.params.root;

    this.sliderWebmark = function() {
        $('.anchorImgList .element').on('click', function() {
            let anchor = $(this).attr('data-anchor');
            if (!$(this).hasClass('active')) {
                $('.anchorImgList .element').removeClass('active');
                $('.slideImg .image').removeClass('active');
                $(this).addClass('active');
                $('#' + anchor).addClass('active');
            }
        });
    }

    this.sliderWebmark();
}



// -------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------
// // ANIMATION BX

function js_PresentationLogiciel() {
    let slider = new js_PresentationLogicielFunction({
        root: $('._presentationLogicielLogicielImmobilierContainer')
    });
}

function js_PresentationLogicielFunction(params) {
    let that = this;
    this.params = params;
    let $this = this.params.root;
    let $link = "";
    let $height = 0;
    let $nextHeight = 0;

    this.functionClickedLink = function() {
        $('.js_selectionInfosPresentation', $this).on('click', function() {
            $link = $(this).attr('data-id-link');
            if (!$(this).hasClass('active')) {
                $height = $('.divInfosStructure.active', $this).innerHeight();
                console.log($height)
                $('.divInfosContainer', $this).css({
                    height: $height
                })
                $nextHeight = $('#' + $link).innerHeight();
                $('.js_selectionInfosPresentation', $this).removeClass('active');
                $(this).addClass('active');
                $('.divInfosStructure', $this).removeClass('active');
                $('#' + $link).addClass('active');
                $('.divInfosContainer', $this).css({
                    height: $nextHeight
                });

                setTimeout(function() {
                    $('.divInfosContainer', $this).removeAttr('style');
                }, 1100);
            }
        });
    }

    this.functionClickedLink();
}



// -------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------
// // AJAX POPIN

function js_CallPopin() {
    let callPopin = new js_CallPopinFunction({
        root: $('.js_CallPopin')
    });
}

function js_CallPopinFunction(params) {
    let that = this;
    this.params = params;
    let $this = this.params.root;

    let $filePopin = '';

    this.callPopinBtn = function() {
        $this.on('click', function() {
            $filePopin = $this.attr('data-popin');
            that.callAjax();
        });
    }

    this.callAjax = function() {
        $.ajax({
            url: 'popin_' + $filePopin,
            type: 'GET',
            success: function(data) {
                $("#containerPopin .structurePopin").html(data);
                $("#containerPopin").addClass('active');
                setTimeout(function() {
                    $("#containerPopin").addClass('display');
                    $("body").addClass('popinOpen');
                }, 250);
                that.closePopin();
            }
        });
    }

    this.closePopin = function() {
        $("#containerPopin .btnClosePopin").on('click', function() {
            $("#containerPopin").removeClass('display');
            $("body").removeClass('popinOpen');
            setTimeout(function() {
                $("#containerPopin").removeClass('active');
                $("#containerPopin .structurePopin").html('');
            }, 250);
        });
    }

    this.callPopinBtn();

}
