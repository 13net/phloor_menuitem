<?php
/*****************************************************************************
 * Phloor Menuitem                                                           *
 *                                                                           *
 * Copyright (C) 2012 Alois Leitner                                          *
 *                                                                           *
 * This program is free software: you can redistribute it and/or modify      *
 * it under the terms of the GNU General Public License as published by      *
 * the Free Software Foundation, either version 2 of the License, or         *
 * (at your option) any later version.                                       *
 *                                                                           *
 * This program is distributed in the hope that it will be useful,           *
 * but WITHOUT ANY WARRANTY; without even the implied warranty of            *
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the             *
 * GNU General Public License for more details.                              *
 *                                                                           *
 * You should have received a copy of the GNU General Public License         *
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.     *
 *                                                                           *
 * "When code and comments disagree both are probably wrong." (Norm Schryer) *
 *****************************************************************************/
?>
<?php
/**
 * Slightly modified site menu css
 */
?>

/* ***************************************
	SITE MENU
*************************************** */
.elgg-menu-site {
	z-index: 1;
}

.elgg-menu-site-default a {
	font-weight: bold;
	padding: 3px 13px 0px 13px;
/*	height: 20px;
*/
}
.elgg-menu-site > li > a {
	font-weight: bold;
	padding: 3px 13px 0px 13px;
	height: 20px;
}

.elgg-menu-site-default a:hover,
.elgg-menu-site > li > a:hover {
	text-decoration: none;
}


.elgg-menu-site-default {
	position: absolute;
	bottom: 0;
	left: 0;
	height: 23px;
}

.elgg-menu-site-default > li {
	float: left;
	margin-right: 1px;
}

.elgg-menu-site-default > li > a {color: white}


.elgg-menu-site-default > .elgg-state-selected > a,
.elgg-menu-site-default > li:hover > a {
	background: white;
	color: #555;

	-webkit-box-shadow: 2px -1px 1px rgba(0, 0, 0, 0.25);
	-moz-box-shadow: 2px -1px 1px rgba(0, 0, 0, 0.25);
	box-shadow: 2px -1px 1px rgba(0, 0, 0, 0.25);

	-webkit-border-radius: 4px 4px 0 0;
	-moz-border-radius: 4px 4px 0 0;
	border-radius: 4px 4px 0 0;
}

.elgg-menu-site-default > li > ul {
	display: none;
	position: absolute;
	left: -1px;
	z-index: 2;
	min-width: 200px;
	border: 1px solid #999;
	border-top: 0;
	clear:both;

	-webkit-border-radius: 0 0 4px 4px;
	-moz-border-radius: 0 0 4px 4px;
	border-radius: 0 0 4px 4px;

	-webkit-box-shadow: 1px 1px 1px rgba(0, 0, 0, 0.25);
	-moz-box-shadow: 1px 1px 1px rgba(0, 0, 0, 0.25);
	box-shadow: 1px 1px 1px rgba(0, 0, 0, 0.25);
}

.elgg-menu-site-more {
	display: none;
	position: absolute;
	left: -1px;
	z-index: 2;
	min-width: 150px;
	border: 1px solid #999;
	border-top: 0;
	clear:both;

	-webkit-border-radius: 0 0 4px 4px;
	-moz-border-radius: 0 0 4px 4px;
	border-radius: 0 0 4px 4px;

	-webkit-box-shadow: 1px 1px 1px rgba(0, 0, 0, 0.25);
	-moz-box-shadow: 1px 1px 1px rgba(0, 0, 0, 0.25);
	box-shadow: 1px 1px 1px rgba(0, 0, 0, 0.25);
}

.elgg-menu-site-default > li:hover > ul,
li:hover > .elgg-menu-site-more {
display:block;
}

.elgg-menu-site-default > li > ul > li a,
.elgg-menu-site-more > li a {
	background: white;
	color: #555;

	-webkit-border-radius: 0;
	-moz-border-radius: 0;
	border-radius: 0;

	-webkit-box-shadow: none;
	-moz-box-shadow: none;
	box-shadow: none;
}

.elgg-menu-site-default > li > ul > li a:hover,
.elgg-menu-site-more > li a:hover {
	background: #4690D6;
	color: white;
}

.elgg-menu-site-default > li > ul > li a,
.elgg-menu-site-default > li > ul > li a:hover,
.elgg-menu-site-more > li > a,
.elgg-menu-site-more > li > a:hover {
	border-top:1px solid #CCC;
}

.elgg-menu-site-default > li > ul > li:last-child > a,
.elgg-menu-site-default > li > ul > li:last-child > a:hover,
.elgg-menu-site-more > li:last-child > a,
.elgg-menu-site-more > li:last-child > a:hover {
	-webkit-border-radius: 0 0 4px 4px;
	-moz-border-radius: 0 0 4px 4px;
	border-radius: 0 0 4px 4px;
}

.elgg-more > a:before {
	content: "\25BC";
	font-size: smaller;
	margin-right: 4px;
}