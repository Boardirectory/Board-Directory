<?php

/* footer.html */
class __TwigTemplate_c66cb68f1eee4aa7612734360a731340 extends Twig_Template
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
        echo "\t</div>

<div id=\"page-footer\">

\t<div class=\"navbar\">
\t\t<div class=\"inner\"><span class=\"corners-top\"><span></span></span>

\t\t<ul class=\"linklist\">
\t\t\t<li class=\"icon-home\"><a href=\"";
        // line 9
        if (isset($context["U_INDEX"])) { $_U_INDEX_ = $context["U_INDEX"]; } else { $_U_INDEX_ = null; }
        echo twig_escape_filter($this->env, $_U_INDEX_, "html", null, true);
        echo "\" accesskey=\"h\">";
        if (isset($context["L_INDEX"])) { $_L_INDEX_ = $context["L_INDEX"]; } else { $_L_INDEX_ = null; }
        echo twig_escape_filter($this->env, $_L_INDEX_, "html", null, true);
        echo "</a></li>
\t\t\t\t";
        // line 10
        if (isset($context["S_IS_BOT"])) { $_S_IS_BOT_ = $context["S_IS_BOT"]; } else { $_S_IS_BOT_ = null; }
        if ((!$_S_IS_BOT_)) {
            // line 11
            echo "\t\t\t\t\t";
            if (isset($context["S_WATCH_FORUM_LINK"])) { $_S_WATCH_FORUM_LINK_ = $context["S_WATCH_FORUM_LINK"]; } else { $_S_WATCH_FORUM_LINK_ = null; }
            if ($_S_WATCH_FORUM_LINK_) {
                echo "<li ";
                if (isset($context["S_WATCHING_FORUM"])) { $_S_WATCHING_FORUM_ = $context["S_WATCHING_FORUM"]; } else { $_S_WATCHING_FORUM_ = null; }
                if ($_S_WATCHING_FORUM_) {
                    echo "class=\"icon-unsubscribe\"";
                } else {
                    echo "class=\"icon-subscribe\"";
                }
                echo "><a href=\"";
                if (isset($context["S_WATCH_FORUM_LINK"])) { $_S_WATCH_FORUM_LINK_ = $context["S_WATCH_FORUM_LINK"]; } else { $_S_WATCH_FORUM_LINK_ = null; }
                echo twig_escape_filter($this->env, $_S_WATCH_FORUM_LINK_, "html", null, true);
                echo "\" title=\"";
                if (isset($context["S_WATCH_FORUM_TITLE"])) { $_S_WATCH_FORUM_TITLE_ = $context["S_WATCH_FORUM_TITLE"]; } else { $_S_WATCH_FORUM_TITLE_ = null; }
                echo twig_escape_filter($this->env, $_S_WATCH_FORUM_TITLE_, "html", null, true);
                echo "\">";
                if (isset($context["S_WATCH_FORUM_TITLE"])) { $_S_WATCH_FORUM_TITLE_ = $context["S_WATCH_FORUM_TITLE"]; } else { $_S_WATCH_FORUM_TITLE_ = null; }
                echo twig_escape_filter($this->env, $_S_WATCH_FORUM_TITLE_, "html", null, true);
                echo "</a></li>";
            }
            // line 12
            echo "\t\t\t\t\t";
            if (isset($context["U_WATCH_TOPIC"])) { $_U_WATCH_TOPIC_ = $context["U_WATCH_TOPIC"]; } else { $_U_WATCH_TOPIC_ = null; }
            if ($_U_WATCH_TOPIC_) {
                echo "<li ";
                if (isset($context["S_WATCHING_TOPIC"])) { $_S_WATCHING_TOPIC_ = $context["S_WATCHING_TOPIC"]; } else { $_S_WATCHING_TOPIC_ = null; }
                if ($_S_WATCHING_TOPIC_) {
                    echo "class=\"icon-unsubscribe\"";
                } else {
                    echo "class=\"icon-subscribe\"";
                }
                echo "><a href=\"";
                if (isset($context["U_WATCH_TOPIC"])) { $_U_WATCH_TOPIC_ = $context["U_WATCH_TOPIC"]; } else { $_U_WATCH_TOPIC_ = null; }
                echo twig_escape_filter($this->env, $_U_WATCH_TOPIC_, "html", null, true);
                echo "\" title=\"";
                if (isset($context["L_WATCH_TOPIC"])) { $_L_WATCH_TOPIC_ = $context["L_WATCH_TOPIC"]; } else { $_L_WATCH_TOPIC_ = null; }
                echo twig_escape_filter($this->env, $_L_WATCH_TOPIC_, "html", null, true);
                echo "\">";
                if (isset($context["L_WATCH_TOPIC"])) { $_L_WATCH_TOPIC_ = $context["L_WATCH_TOPIC"]; } else { $_L_WATCH_TOPIC_ = null; }
                echo twig_escape_filter($this->env, $_L_WATCH_TOPIC_, "html", null, true);
                echo "</a></li>";
            }
            // line 13
            echo "\t\t\t\t\t";
            if (isset($context["U_BOOKMARK_TOPIC"])) { $_U_BOOKMARK_TOPIC_ = $context["U_BOOKMARK_TOPIC"]; } else { $_U_BOOKMARK_TOPIC_ = null; }
            if ($_U_BOOKMARK_TOPIC_) {
                echo "<li class=\"icon-bookmark\"><a href=\"";
                if (isset($context["U_BOOKMARK_TOPIC"])) { $_U_BOOKMARK_TOPIC_ = $context["U_BOOKMARK_TOPIC"]; } else { $_U_BOOKMARK_TOPIC_ = null; }
                echo twig_escape_filter($this->env, $_U_BOOKMARK_TOPIC_, "html", null, true);
                echo "\" title=\"";
                if (isset($context["L_BOOKMARK_TOPIC"])) { $_L_BOOKMARK_TOPIC_ = $context["L_BOOKMARK_TOPIC"]; } else { $_L_BOOKMARK_TOPIC_ = null; }
                echo twig_escape_filter($this->env, $_L_BOOKMARK_TOPIC_, "html", null, true);
                echo "\">";
                if (isset($context["L_BOOKMARK_TOPIC"])) { $_L_BOOKMARK_TOPIC_ = $context["L_BOOKMARK_TOPIC"]; } else { $_L_BOOKMARK_TOPIC_ = null; }
                echo twig_escape_filter($this->env, $_L_BOOKMARK_TOPIC_, "html", null, true);
                echo "</a></li>";
            }
            // line 14
            echo "\t\t\t\t\t";
            if (isset($context["U_BUMP_TOPIC"])) { $_U_BUMP_TOPIC_ = $context["U_BUMP_TOPIC"]; } else { $_U_BUMP_TOPIC_ = null; }
            if ($_U_BUMP_TOPIC_) {
                echo "<li class=\"icon-bump\"><a href=\"";
                if (isset($context["U_BUMP_TOPIC"])) { $_U_BUMP_TOPIC_ = $context["U_BUMP_TOPIC"]; } else { $_U_BUMP_TOPIC_ = null; }
                echo twig_escape_filter($this->env, $_U_BUMP_TOPIC_, "html", null, true);
                echo "\" title=\"";
                if (isset($context["L_BUMP_TOPIC"])) { $_L_BUMP_TOPIC_ = $context["L_BUMP_TOPIC"]; } else { $_L_BUMP_TOPIC_ = null; }
                echo twig_escape_filter($this->env, $_L_BUMP_TOPIC_, "html", null, true);
                echo "\">";
                if (isset($context["L_BUMP_TOPIC"])) { $_L_BUMP_TOPIC_ = $context["L_BUMP_TOPIC"]; } else { $_L_BUMP_TOPIC_ = null; }
                echo twig_escape_filter($this->env, $_L_BUMP_TOPIC_, "html", null, true);
                echo "</a></li>";
            }
            // line 15
            echo "\t\t\t\t";
        }
        // line 16
        echo "\t\t\t<li class=\"rightside\">";
        if (isset($context["U_TEAM"])) { $_U_TEAM_ = $context["U_TEAM"]; } else { $_U_TEAM_ = null; }
        if ($_U_TEAM_) {
            echo "<a href=\"";
            if (isset($context["U_TEAM"])) { $_U_TEAM_ = $context["U_TEAM"]; } else { $_U_TEAM_ = null; }
            echo twig_escape_filter($this->env, $_U_TEAM_, "html", null, true);
            echo "\">";
            if (isset($context["L_THE_TEAM"])) { $_L_THE_TEAM_ = $context["L_THE_TEAM"]; } else { $_L_THE_TEAM_ = null; }
            echo twig_escape_filter($this->env, $_L_THE_TEAM_, "html", null, true);
            echo "</a> &bull; ";
        }
        if (isset($context["S_IS_BOT"])) { $_S_IS_BOT_ = $context["S_IS_BOT"]; } else { $_S_IS_BOT_ = null; }
        if ((!$_S_IS_BOT_)) {
            echo "<a href=\"";
            if (isset($context["U_DELETE_COOKIES"])) { $_U_DELETE_COOKIES_ = $context["U_DELETE_COOKIES"]; } else { $_U_DELETE_COOKIES_ = null; }
            echo twig_escape_filter($this->env, $_U_DELETE_COOKIES_, "html", null, true);
            echo "\">";
            if (isset($context["L_DELETE_COOKIES"])) { $_L_DELETE_COOKIES_ = $context["L_DELETE_COOKIES"]; } else { $_L_DELETE_COOKIES_ = null; }
            echo twig_escape_filter($this->env, $_L_DELETE_COOKIES_, "html", null, true);
            echo "</a> &bull; ";
        }
        if (isset($context["S_TIMEZONE"])) { $_S_TIMEZONE_ = $context["S_TIMEZONE"]; } else { $_S_TIMEZONE_ = null; }
        echo twig_escape_filter($this->env, $_S_TIMEZONE_, "html", null, true);
        echo "</li>
\t\t</ul>

\t\t<span class=\"corners-bottom\"><span></span></span></div>
\t</div>

\t<div class=\"copyright\">
\t\tBy accessing and using this forum you agree to the usage of cookies. <a href=\"http://pastebin.com/tipRB8EZ\">More on cookies</a>.
\t\t";
        // line 24
        if (isset($context["DEBUG_OUTPUT"])) { $_DEBUG_OUTPUT_ = $context["DEBUG_OUTPUT"]; } else { $_DEBUG_OUTPUT_ = null; }
        if ($_DEBUG_OUTPUT_) {
            echo "<br />";
            if (isset($context["DEBUG_OUTPUT"])) { $_DEBUG_OUTPUT_ = $context["DEBUG_OUTPUT"]; } else { $_DEBUG_OUTPUT_ = null; }
            echo twig_escape_filter($this->env, $_DEBUG_OUTPUT_, "html", null, true);
        }
        // line 25
        echo "\t</div>
</div>
</div>
</div>

<div>
\t<a id=\"bottom\" name=\"bottom\" accesskey=\"z\"></a>
\t";
        // line 32
        if (isset($context["S_IS_BOT"])) { $_S_IS_BOT_ = $context["S_IS_BOT"]; } else { $_S_IS_BOT_ = null; }
        if ((!$_S_IS_BOT_)) {
            if (isset($context["RUN_CRON_TASK"])) { $_RUN_CRON_TASK_ = $context["RUN_CRON_TASK"]; } else { $_RUN_CRON_TASK_ = null; }
            echo twig_escape_filter($this->env, $_RUN_CRON_TASK_, "html", null, true);
        }
        // line 33
        echo "</div>
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "footer.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  170 => 33,  164 => 32,  155 => 25,  148 => 24,  115 => 16,  112 => 15,  97 => 14,  82 => 13,  60 => 12,  38 => 11,  35 => 10,  27 => 9,  17 => 1,);
    }
}
