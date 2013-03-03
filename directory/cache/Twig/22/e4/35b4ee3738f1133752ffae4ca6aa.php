<?php

/* default.css */
class __TwigTemplate_22e435b4ee3738f1133752ffae4ca6aa extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "* {
\tmargin: 0px;
\tpadding: 0px;
}

a {
\tcolor: #000000;
\ttext-decoration: none;
}

html {
\tfont-size: 100%;
\theight: 100%;
}

body {
\tfont-size: 10px;
\tmin-height: 100%;
\tbackground-image: url('";
        // line 19
        if (isset($context["style"])) { $_style_ = $context["style"]; } else { $_style_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_style_, "image_path"), "html", null, true);
        echo "background.png');
\tbackground-repeat: repeat;
\tbackground-attachment: fixed;
}

#outterWrap {
\twidth: 950px;
\theight: 100%;
\tmargin: auto;
\tpadding: 0px 20px;
\tbackground-color: rgba(0, 0, 0, 0.44);
}

#innerWrap {
\twidth: 100%;
\theight: 100%;
\tmargin: auto;
\tpadding: 0px;
\tbackground-color: #FFFFFF;
}

#header {
\theight: 125px;
\tpadding-top: 5px;
\tbackground-color: #12A3EB;
\tbackground-image: url('";
        // line 44
        if (isset($context["style"])) { $_style_ = $context["style"]; } else { $_style_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_style_, "image_path"), "html", null, true);
        echo "header_background.png');
\tbackground-repeat: repeat;
}

#logo {
\tdisplay: block;
\twidth: 444px;
\theight: 116px;
\tbackground-image: url('";
        // line 52
        if (isset($context["style"])) { $_style_ = $context["style"]; } else { $_style_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_style_, "image_path"), "html", null, true);
        echo "header_logo.png');
\tbackground-repeat: no-repeat;
}

#content {
\tpadding: 2px;
}

#nav-bar {
\tdisplay: block;
\twidth: 906px;
\theight: 30px;
\tpadding: 0px 20px;
\tbackground-color: #0A82D2;
\t
\t-webkit-border-radius: 5px;
\t-moz-border-radius: 5px;
\tborder-radius: 5px;
}

.nav-item {
\tdisplay: inline-block;
\tpadding: 0px 7px;
\tfont-family: \"Segoe UI\", Calibri, \"Myriad Pro\" ,Myriad, \"Trebuchet MS\", Helvetica, Arial, sans-serif;
\tfont-size: 15px;
\tfont-weight: bold;
\tline-height: 30px;
}

.nav-item:hover {
\tcolor: #FF1900;
\ttext-shadow: 0px 0px 2px #000000;
}
";
    }

    public function getTemplateName()
    {
        return "default.css";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 52,  66 => 44,  37 => 19,  17 => 1,);
    }
}
