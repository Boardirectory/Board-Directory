<?php

/* header.html */
class __TwigTemplate_a0a3593a61ae6eabd74579de51f9a716 extends Twig_Template
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
<html xmlns=\"http://www.w3.org/1999/xhtml\" dir=\"";
        // line 2
        if (isset($context["S_CONTENT_DIRECTION"])) { $_S_CONTENT_DIRECTION_ = $context["S_CONTENT_DIRECTION"]; } else { $_S_CONTENT_DIRECTION_ = null; }
        echo twig_escape_filter($this->env, $_S_CONTENT_DIRECTION_, "html", null, true);
        echo "\" lang=\"";
        if (isset($context["S_USER_LANG"])) { $_S_USER_LANG_ = $context["S_USER_LANG"]; } else { $_S_USER_LANG_ = null; }
        echo twig_escape_filter($this->env, $_S_USER_LANG_, "html", null, true);
        echo "\" xml:lang=\"";
        if (isset($context["S_USER_LANG"])) { $_S_USER_LANG_ = $context["S_USER_LANG"]; } else { $_S_USER_LANG_ = null; }
        echo twig_escape_filter($this->env, $_S_USER_LANG_, "html", null, true);
        echo "\">
<head>
\t<meta http-equiv=\"content-type\" content=\"text/html; charset=";
        // line 4
        if (isset($context["S_CONTENT_ENCODING"])) { $_S_CONTENT_ENCODING_ = $context["S_CONTENT_ENCODING"]; } else { $_S_CONTENT_ENCODING_ = null; }
        echo twig_escape_filter($this->env, $_S_CONTENT_ENCODING_, "html", null, true);
        echo "\" />
\t<meta http-equiv=\"content-style-type\" content=\"text/css\" />
\t<meta http-equiv=\"content-language\" content=\"";
        // line 6
        if (isset($context["S_USER_LANG"])) { $_S_USER_LANG_ = $context["S_USER_LANG"]; } else { $_S_USER_LANG_ = null; }
        echo twig_escape_filter($this->env, $_S_USER_LANG_, "html", null, true);
        echo "\" />
\t<meta http-equiv=\"imagetoolbar\" content=\"no\" />
\t<meta name=\"resource-type\" content=\"document\" />
\t<meta name=\"distribution\" content=\"global\" />
\t<meta name=\"keywords\" content=\"\" />
\t<meta name=\"description\" content=\"\" />
\t";
        // line 12
        if (isset($context["META"])) { $_META_ = $context["META"]; } else { $_META_ = null; }
        echo twig_escape_filter($this->env, $_META_, "html", null, true);
        echo "
\t<title>";
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
\t<link href=\"";
        // line 14
        if (isset($context["directory_root"])) { $_directory_root_ = $context["directory_root"]; } else { $_directory_root_ = null; }
        echo twig_escape_filter($this->env, $_directory_root_, "html", null, true);
        echo "themes/prosilver.css\" type=\"text/css\" rel=\"stylesheet\"/>
</head>
<body>

<div id=\"outterWrap\">
\t<div id=\"innerWrap\">
\t\t";
        // line 20
        if (isset($context["template"])) { $_template_ = $context["template"]; } else { $_template_ = null; }
        $template = $this->env->resolveTemplate($_template_);
        $template->display($context);
        // line 21
        echo "\t</div>
</div>
";
    }

    public function getTemplateName()
    {
        return "header.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  80 => 21,  76 => 20,  66 => 14,  53 => 13,  48 => 12,  38 => 6,  32 => 4,  20 => 2,  17 => 1,);
    }
}
