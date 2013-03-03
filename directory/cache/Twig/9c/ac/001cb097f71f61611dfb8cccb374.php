<?php

/* page.html */
class __TwigTemplate_9cac001cb097f71f61611dfb8cccb374 extends Twig_Template
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
        echo "<!DOCTYPE html>
<html lang=\"en-gb\">
\t<head>
\t\t<meta http-equiv=\"content-type\" content=\"text/html; charset=";
        // line 4
        if (isset($context["S_CONTENT_ENCODING"])) { $_S_CONTENT_ENCODING_ = $context["S_CONTENT_ENCODING"]; } else { $_S_CONTENT_ENCODING_ = null; }
        echo twig_escape_filter($this->env, $_S_CONTENT_ENCODING_, "html", null, true);
        echo "\" />
\t\t<meta http-equiv=\"content-style-type\" content=\"text/css\" />
\t\t<meta http-equiv=\"content-language\" content=\"";
        // line 6
        if (isset($context["S_USER_LANG"])) { $_S_USER_LANG_ = $context["S_USER_LANG"]; } else { $_S_USER_LANG_ = null; }
        echo twig_escape_filter($this->env, $_S_USER_LANG_, "html", null, true);
        echo "\" />
\t\t<meta http-equiv=\"imagetoolbar\" content=\"no\" />
\t\t<meta name=\"resource-type\" content=\"document\" />
\t\t<meta name=\"distribution\" content=\"global\" />
\t\t<meta name=\"keywords\" content=\"\" />
\t\t<meta name=\"description\" content=\"\" />
\t\t";
        // line 12
        if (isset($context["META"])) { $_META_ = $context["META"]; } else { $_META_ = null; }
        echo twig_escape_filter($this->env, $_META_, "html", null, true);
        echo "
\t\t<title>";
        // line 13
        if (isset($context["lang"])) { $_lang_ = $context["lang"]; } else { $_lang_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_lang_, "sitename"), "html", null, true);
        echo " ";
        if (isset($context["pagetitle"])) { $_pagetitle_ = $context["pagetitle"]; } else { $_pagetitle_ = null; }
        if ($_pagetitle_) {
            echo "&bull; ";
            if (isset($context["PAGE_TITLE"])) { $_PAGE_TITLE_ = $context["PAGE_TITLE"]; } else { $_PAGE_TITLE_ = null; }
            echo twig_escape_filter($this->env, $_PAGE_TITLE_, "html", null, true);
            echo " ";
        }
        echo "</title>
\t\t<link href=\"";
        // line 14
        if (isset($context["directory_root"])) { $_directory_root_ = $context["directory_root"]; } else { $_directory_root_ = null; }
        echo twig_escape_filter($this->env, $_directory_root_, "html", null, true);
        echo "theme.php?theme=";
        if (isset($context["style"])) { $_style_ = $context["style"]; } else { $_style_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_style_, "name"), "html", null, true);
        echo "\" type=\"text/css\" rel=\"stylesheet\" />
\t</head>
\t<body>
\t\t<div id=\"outterWrap\">
\t\t\t<div id=\"innerWrap\">
\t\t\t\t<div id=\"header\">
\t\t\t\t\t<a href=\"";
        // line 20
        if (isset($context["directory_root"])) { $_directory_root_ = $context["directory_root"]; } else { $_directory_root_ = null; }
        echo twig_escape_filter($this->env, $_directory_root_, "html", null, true);
        echo "\" id=\"logo\"></a>
\t\t\t\t</div>
\t\t\t\t<div id=\"content\">
\t\t\t\t\t<div id=\"nav-bar\">
\t\t\t\t\t\t<a class=\"nav-item\" id=\"nav-item-index\" href=\"";
        // line 24
        if (isset($context["directory_root"])) { $_directory_root_ = $context["directory_root"]; } else { $_directory_root_ = null; }
        echo twig_escape_filter($this->env, $_directory_root_, "html", null, true);
        echo "\">";
        if (isset($context["lang"])) { $_lang_ = $context["lang"]; } else { $_lang_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_lang_, "index"), "html", null, true);
        echo "</a>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t";
        // line 27
        if (isset($context["template"])) { $_template_ = $context["template"]; } else { $_template_ = null; }
        $template = $this->env->resolveTemplate($_template_);
        $template->display($context);
        // line 28
        echo "\t\t\t</div>
\t\t</div>
\t</body>
</html>";
    }

    public function getTemplateName()
    {
        return "page.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  91 => 28,  87 => 27,  77 => 24,  69 => 20,  56 => 14,  43 => 13,  38 => 12,  28 => 6,  22 => 4,  17 => 1,);
    }
}
