--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: applications; Type: TABLE; Schema: public; Owner: ortofit; Tablespace: 
--

CREATE TABLE applications (
    id integer NOT NULL,
    client_id integer,
    created timestamp(0) without time zone NOT NULL,
    type character varying(255) NOT NULL
);


ALTER TABLE applications OWNER TO ortofit;

--
-- Name: applications_id_seq; Type: SEQUENCE; Schema: public; Owner: ortofit
--

CREATE SEQUENCE applications_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE applications_id_seq OWNER TO ortofit;

--
-- Name: clients; Type: TABLE; Schema: public; Owner: ortofit; Tablespace: 
--

CREATE TABLE clients (
    id integer NOT NULL,
    country_id integer,
    msisdn character varying(255) NOT NULL,
    created timestamp(0) without time zone NOT NULL
);


ALTER TABLE clients OWNER TO ortofit;

--
-- Name: clients_id_seq; Type: SEQUENCE; Schema: public; Owner: ortofit
--

CREATE SEQUENCE clients_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE clients_id_seq OWNER TO ortofit;

--
-- Name: countries; Type: TABLE; Schema: public; Owner: ortofit; Tablespace: 
--

CREATE TABLE countries (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    prefix character varying(4) NOT NULL,
    pattern character varying(255) NOT NULL,
    iso2 character varying(2) NOT NULL
);


ALTER TABLE countries OWNER TO ortofit;

--
-- Name: countries_id_seq; Type: SEQUENCE; Schema: public; Owner: ortofit
--

CREATE SEQUENCE countries_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE countries_id_seq OWNER TO ortofit;

--
-- Name: migration_versions; Type: TABLE; Schema: public; Owner: ortofit; Tablespace: 
--

CREATE TABLE migration_versions (
    version character varying(255) NOT NULL
);


ALTER TABLE migration_versions OWNER TO ortofit;

--
-- Name: questions; Type: TABLE; Schema: public; Owner: ortofit; Tablespace: 
--

CREATE TABLE questions (
    id integer NOT NULL,
    quiz_id integer,
    name character varying(255) NOT NULL,
    content character varying(255) NOT NULL,
    index integer NOT NULL,
    "position" character varying(255) NOT NULL,
    template character varying(255) NOT NULL
);


ALTER TABLE questions OWNER TO ortofit;

--
-- Name: questions_id_seq; Type: SEQUENCE; Schema: public; Owner: ortofit
--

CREATE SEQUENCE questions_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE questions_id_seq OWNER TO ortofit;

--
-- Name: quizzes; Type: TABLE; Schema: public; Owner: ortofit; Tablespace: 
--

CREATE TABLE quizzes (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    description character varying(255) NOT NULL,
    start_template character varying(255) NOT NULL,
    result_template character varying(255) NOT NULL,
    result_manager_id character varying(255) NOT NULL
);


ALTER TABLE quizzes OWNER TO ortofit;

--
-- Name: quizzes_id_seq; Type: SEQUENCE; Schema: public; Owner: ortofit
--

CREATE SEQUENCE quizzes_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE quizzes_id_seq OWNER TO ortofit;

--
-- Name: result_variants; Type: TABLE; Schema: public; Owner: ortofit; Tablespace: 
--

CREATE TABLE result_variants (
    result_id integer NOT NULL,
    variant_id integer NOT NULL
);


ALTER TABLE result_variants OWNER TO ortofit;

--
-- Name: results; Type: TABLE; Schema: public; Owner: ortofit; Tablespace: 
--

CREATE TABLE results (
    id integer NOT NULL,
    quiz_id integer,
    created timestamp(0) without time zone NOT NULL
);


ALTER TABLE results OWNER TO ortofit;

--
-- Name: results_id_seq; Type: SEQUENCE; Schema: public; Owner: ortofit
--

CREATE SEQUENCE results_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE results_id_seq OWNER TO ortofit;

--
-- Name: variants; Type: TABLE; Schema: public; Owner: ortofit; Tablespace: 
--

CREATE TABLE variants (
    id integer NOT NULL,
    question_id integer,
    name character varying(255) NOT NULL,
    content character varying(255) NOT NULL,
    index integer NOT NULL,
    positive boolean NOT NULL,
    result character varying(255) DEFAULT NULL::character varying,
    recommendation character varying(255) DEFAULT NULL::character varying
);


ALTER TABLE variants OWNER TO ortofit;

--
-- Name: variants_id_seq; Type: SEQUENCE; Schema: public; Owner: ortofit
--

CREATE SEQUENCE variants_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE variants_id_seq OWNER TO ortofit;

--
-- Data for Name: applications; Type: TABLE DATA; Schema: public; Owner: ortofit
--

COPY applications (id, client_id, created, type) FROM stdin;
17	4	2015-10-09 16:10:55	visit
18	5	2015-10-09 17:55:13	visit
19	5	2015-10-11 08:23:20	visit
20	6	2015-10-11 13:20:09	visit
21	5	2015-10-14 17:26:19	visit
22	7	2015-10-15 13:34:18	visit
23	8	2015-10-16 16:02:50	visit
24	9	2015-10-18 23:36:57	visit
25	9	2015-10-21 09:03:10	visit
26	5	2015-10-27 10:01:30	visit
27	10	2015-10-28 20:59:43	visit
28	11	2015-10-29 13:05:51	visit
29	5	2015-11-04 20:57:47	visit
30	12	2015-11-10 07:41:42	visit
31	13	2015-11-11 11:32:37	visit
32	14	2015-11-13 17:37:04	visit
33	15	2015-11-15 11:42:36	visit
34	16	2015-11-17 07:53:35	visit
35	17	2015-11-18 11:26:17	visit
36	18	2015-11-29 17:28:45	visit
37	19	2015-11-29 21:48:38	visit
38	20	2015-12-04 19:25:10	visit
39	21	2015-12-08 19:26:46	visit
40	22	2015-12-10 13:11:34	visit
41	23	2015-12-11 08:49:27	visit
42	24	2015-12-12 00:32:23	visit
\.


--
-- Name: applications_id_seq; Type: SEQUENCE SET; Schema: public; Owner: ortofit
--

SELECT pg_catalog.setval('applications_id_seq', 42, true);


--
-- Data for Name: clients; Type: TABLE DATA; Schema: public; Owner: ortofit
--

COPY clients (id, country_id, msisdn, created) FROM stdin;
4	1	380504526557	2015-10-09 16:10:55
5	1	380674271099	2015-10-09 17:55:13
6	1	380506958419	2015-10-11 13:20:09
7	1	380994563959	2015-10-15 13:34:18
8	1	380674760647	2015-10-16 16:02:50
9	1	380672992012	2015-10-18 23:36:57
10	1	380662853143	2015-10-28 20:59:43
11	1	380676393031	2015-10-29 13:05:51
12	1	380952257227	2015-11-10 07:41:42
13	1	380965949894	2015-11-11 11:32:37
14	1	380982101426	2015-11-13 17:37:04
15	1	380978626597	2015-11-15 11:42:36
16	1	380967842128	2015-11-17 07:53:35
17	1	380675244324	2015-11-18 11:26:17
18	1	380677323682	2015-11-29 17:28:45
19	1	380662182773	2015-11-29 21:48:38
20	1	380974634521	2015-12-04 19:25:10
21	1	380976224275	2015-12-08 19:26:46
22	1	380504512799	2015-12-10 13:11:34
23	1	380965461796	2015-12-11 08:49:27
24	1	380678258282	2015-12-12 00:32:23
\.


--
-- Name: clients_id_seq; Type: SEQUENCE SET; Schema: public; Owner: ortofit
--

SELECT pg_catalog.setval('clients_id_seq', 24, true);


--
-- Data for Name: countries; Type: TABLE DATA; Schema: public; Owner: ortofit
--

COPY countries (id, name, prefix, pattern, iso2) FROM stdin;
1	Ukraine	380	^380[3-9]{1}[0-9]{8}$	ua
\.


--
-- Name: countries_id_seq; Type: SEQUENCE SET; Schema: public; Owner: ortofit
--

SELECT pg_catalog.setval('countries_id_seq', 1, true);


--
-- Data for Name: migration_versions; Type: TABLE DATA; Schema: public; Owner: ortofit
--

COPY migration_versions (version) FROM stdin;
20151008230610
\.


--
-- Data for Name: questions; Type: TABLE DATA; Schema: public; Owner: ortofit
--

COPY questions (id, quiz_id, name, content, index, "position", template) FROM stdin;
1	1	Ориентировочно проверяем состояние сводов стопы	Нанесите на подошвенную поверхность стоп жирный крем и наступите на лист бумаги.<br> Оцените полученный отпечаток. На какой из приведенных ниже рисунков он похож?	1	horizon	OrtofitQuizBundle:Quiz:question.html.twig
2	1	Проверяем положение заднего отдела стоп	Посмотрите на стопы ребенка со спины. <br> Для взрослых - можно попросить, кого-то cфотографировать задний отдел Ваших стоп.	2	horizon	OrtofitQuizBundle:Quiz:question.html.twig
3	1	Проверяем позицию переднего отдела стопы	Посмотрите на стопы ребенка спереди. <br> Для взрослых можно увидеть отражение переднего отдела стоп в зеркале. <br> На какой рисунок больше похоже?	3	vertical	OrtofitQuizBundle:Quiz:question.html.twig
4	1	Проверяем наличие приведения переднего отдела стопы	По полученному отпечатку стопы и посмотрев сверху на стопу отметьте образует ли угол продольная ось стопы. Имеет ли место приведение пальцев во внутрь или наружу?  На какой рисунок больше похоже?	4	horizon	OrtofitQuizBundle:Quiz:question.html.twig
5	1	Проверяем положение коленных суставов относительно вертикальной оси	Посмотрите на положение коленных суставов, на какой рисунок больше похоже?	5	horizon	OrtofitQuizBundle:Quiz:question.html.twig
6	1	Проверяем как изнашивается обувь	Посмотрите на подошву изношенной обуви. Отметьте где наиболее стирается подошва.  Каким зонам соответствует рисунок стирания? <br> <img src="/bundles/ortofitquiz/img/feet_6.png">	6	horizon	OrtofitQuizBundle:Quiz:question.html.twig
7	1	Испытываете ли вы боли?		7	vertical	OrtofitQuizBundle:Quiz:question.html.twig
8	1	Укажите возраст		8	vertical	OrtofitQuizBundle:Quiz:question.html.twig
\.


--
-- Name: questions_id_seq; Type: SEQUENCE SET; Schema: public; Owner: ortofit
--

SELECT pg_catalog.setval('questions_id_seq', 8, true);


--
-- Data for Name: quizzes; Type: TABLE DATA; Schema: public; Owner: ortofit
--

COPY quizzes (id, name, description, start_template, result_template, result_manager_id) FROM stdin;
1	Диагностический тест состояния стоп	Уважаемые посетители сайта “Ортофит”, для Вашего удобства мы подготовили  диагностический тест состояния стоп который можно пройти в онлайн-режиме.	OrtofitQuizBundle:Quiz:start.html.twig	OrtofitQuizBundle:Quiz:result.html.twig	ortofit_quiz.result_manager
\.


--
-- Name: quizzes_id_seq; Type: SEQUENCE SET; Schema: public; Owner: ortofit
--

SELECT pg_catalog.setval('quizzes_id_seq', 1, true);


--
-- Data for Name: result_variants; Type: TABLE DATA; Schema: public; Owner: ortofit
--

COPY result_variants (result_id, variant_id) FROM stdin;
1	1
1	8
1	9
1	12
1	17
1	18
1	28
1	33
2	5
2	6
2	10
2	12
2	15
2	18
2	24
2	30
3	5
3	8
3	10
3	13
3	16
3	22
3	27
3	31
4	3
4	7
4	9
4	13
4	17
4	18
4	28
4	34
5	1
5	7
5	10
5	14
5	15
5	18
5	24
5	34
6	5
6	8
6	11
6	14
6	17
6	19
6	27
6	30
7	4
7	7
7	11
7	14
7	17
7	23
7	27
7	34
8	5
8	6
8	11
8	14
8	15
8	20
8	26
8	34
9	1
9	8
9	10
9	12
9	17
9	21
9	26
9	34
10	5
10	6
10	11
10	14
10	17
10	21
10	24
10	29
11	4
11	8
11	10
11	14
11	17
11	21
11	27
11	34
12	4
12	6
12	10
12	12
12	15
12	20
12	27
12	34
13	1
13	7
13	10
13	14
13	15
13	19
13	26
13	34
14	4
14	6
14	11
14	12
14	17
14	22
14	28
14	30
15	1
15	6
15	11
15	12
15	16
15	19
15	27
15	34
16	5
16	8
16	11
16	14
16	15
16	19
16	27
16	34
17	1
17	7
17	10
17	14
17	15
17	19
17	27
17	34
18	3
18	6
18	11
18	13
18	17
18	23
18	24
18	34
19	4
19	6
19	10
19	13
19	15
19	23
19	24
19	31
20	1
20	7
20	10
20	12
20	15
20	19
20	26
20	33
21	5
21	6
21	10
21	12
21	17
21	21
21	24
21	29
22	1
22	7
22	10
22	12
22	15
22	18
22	24
22	34
23	4
23	8
23	10
23	13
23	15
23	23
23	27
23	34
24	5
24	8
24	11
24	13
24	17
24	18
24	27
24	30
25	3
25	8
25	10
25	12
25	16
25	20
25	24
25	29
26	4
26	7
26	10
26	14
26	15
26	21
26	27
26	34
27	5
27	6
27	11
27	14
27	17
27	21
27	27
27	30
28	3
28	7
28	10
28	14
28	16
28	23
28	27
28	34
29	4
29	8
29	9
29	13
29	17
29	21
29	27
29	32
30	4
30	8
30	9
30	13
30	16
30	18
30	27
30	32
31	4
31	7
31	10
31	14
31	15
31	21
31	27
31	32
32	4
32	7
32	9
32	13
32	17
32	18
32	27
32	32
33	1
33	6
33	11
33	14
33	17
33	18
33	24
33	31
34	1
34	8
34	9
34	13
34	15
34	22
34	27
34	34
35	5
35	8
35	11
35	12
35	17
35	20
35	24
35	29
36	5
36	8
36	11
36	14
36	15
36	19
36	27
36	30
37	4
37	7
37	11
37	14
37	15
37	18
37	27
37	30
38	1
38	7
38	10
38	14
38	15
38	19
38	26
38	34
39	3
39	7
39	10
39	13
39	16
39	19
39	27
39	34
40	4
40	6
40	11
40	13
40	17
40	21
40	24
40	29
41	4
41	7
41	9
41	13
41	15
41	19
41	24
41	34
42	4
42	7
42	10
42	13
42	15
42	19
42	27
42	34
43	5
43	8
43	10
43	14
43	15
43	19
43	24
43	30
44	4
44	6
44	9
44	14
44	17
44	18
44	24
44	30
45	5
45	6
45	11
45	13
45	17
45	21
45	26
45	34
46	3
46	8
46	10
46	14
46	15
46	23
46	26
46	34
47	1
47	6
47	11
47	14
47	17
47	21
47	24
47	30
48	1
48	7
48	10
48	14
48	17
48	18
48	26
48	34
49	5
49	8
49	10
49	12
49	15
49	21
49	27
49	34
50	2
50	7
50	10
50	14
50	17
50	19
50	28
50	31
51	4
51	6
51	10
51	13
51	16
51	18
51	26
51	34
52	1
52	7
52	10
52	14
52	16
52	19
52	26
52	34
53	1
53	7
53	10
53	14
53	15
53	18
53	27
53	34
54	4
54	7
54	10
54	12
54	16
54	21
54	27
54	34
55	5
55	6
55	11
55	14
55	15
55	20
55	27
55	34
56	4
56	6
56	10
56	14
56	17
56	18
56	27
56	34
57	4
57	6
57	10
57	12
57	17
57	18
57	24
57	34
58	1
58	8
58	10
58	12
58	17
58	18
58	27
58	31
59	1
59	7
59	10
59	14
59	16
59	18
59	27
59	34
60	1
60	6
60	11
60	14
60	15
60	23
60	25
60	31
61	5
61	8
61	10
61	14
61	16
61	18
61	24
61	31
62	3
62	8
62	9
62	12
62	17
62	23
62	24
62	31
63	4
63	6
63	11
63	14
63	17
63	19
63	24
63	30
64	4
64	6
64	11
64	13
64	17
64	21
64	26
64	34
65	1
65	6
65	10
65	13
65	16
65	18
65	27
65	34
66	4
66	8
66	9
66	12
66	16
66	23
66	24
66	29
67	1
67	8
67	11
67	12
67	15
67	18
67	25
67	34
68	5
68	8
68	11
68	14
68	17
68	18
68	28
68	31
69	5
69	6
69	11
69	14
69	17
69	18
69	24
69	30
70	1
70	7
70	10
70	12
70	15
70	18
70	25
70	34
71	5
71	6
71	11
71	14
71	16
71	18
71	24
71	30
72	5
72	6
72	10
72	13
72	16
72	21
72	27
72	32
73	4
73	6
73	10
73	14
73	15
73	18
73	28
73	34
74	1
74	7
74	10
74	14
74	15
74	18
74	25
74	34
75	4
75	6
75	11
75	12
75	17
75	23
75	24
75	30
76	1
76	7
76	10
76	14
76	16
76	19
76	24
76	29
77	1
77	6
77	11
77	14
77	17
77	21
77	24
77	30
78	3
78	6
78	10
78	14
78	15
78	20
78	24
78	34
79	4
79	7
79	10
79	13
79	16
79	18
79	27
79	34
80	5
80	6
80	9
80	14
80	17
80	18
80	27
80	34
81	4
81	6
81	9
81	12
81	15
81	20
81	24
81	29
82	1
82	6
82	10
82	12
82	15
82	20
82	24
82	29
83	1
83	7
83	10
83	14
83	15
83	18
83	24
83	34
84	4
84	7
84	10
84	14
84	15
84	19
84	26
84	34
85	3
85	6
85	10
85	14
85	17
85	18
85	27
85	34
86	1
86	6
86	10
86	14
86	16
86	19
86	27
86	34
87	1
87	8
87	10
87	14
87	16
87	20
87	27
87	34
88	5
88	6
88	11
88	12
88	17
88	20
88	26
88	32
89	5
89	6
89	11
89	14
89	17
89	18
89	24
89	30
90	1
90	7
90	10
90	12
90	15
90	23
90	27
90	34
91	1
91	7
91	10
91	14
91	15
91	18
91	27
91	34
92	1
92	7
92	11
92	13
92	16
92	23
92	24
92	34
93	1
93	8
93	10
93	13
93	15
93	18
93	26
93	34
94	5
94	6
94	10
94	14
94	17
94	20
94	24
94	31
95	5
95	8
95	11
95	14
95	15
95	20
95	27
95	30
96	1
96	7
96	10
96	14
96	15
96	19
96	27
96	34
97	2
97	7
97	11
97	13
97	16
97	21
97	27
97	33
98	1
98	7
98	10
98	14
98	16
98	19
98	24
98	34
99	1
99	6
99	10
99	13
99	15
99	18
99	26
99	34
100	5
100	8
100	11
100	14
100	17
100	19
100	24
100	30
101	4
101	8
101	11
101	12
101	16
101	21
101	27
101	34
102	5
102	6
102	11
102	14
102	17
102	19
102	24
102	29
103	1
103	7
103	10
103	14
103	15
103	18
103	26
103	34
104	3
104	8
104	9
104	12
104	16
104	22
104	27
104	34
105	3
105	7
105	10
105	13
105	17
105	21
105	24
105	30
106	5
106	6
106	10
106	14
106	15
106	21
106	24
106	30
107	3
107	6
107	11
107	13
107	15
107	19
107	27
107	30
108	4
108	8
108	10
108	12
108	15
108	21
108	27
108	34
109	1
109	7
109	10
109	12
109	15
109	18
109	27
109	34
110	4
110	6
110	11
110	14
110	17
110	19
110	24
110	29
111	4
111	7
111	11
111	14
111	15
111	23
111	27
111	34
112	4
112	6
112	11
112	14
112	17
112	20
112	27
112	29
113	5
113	6
113	10
113	13
113	15
113	18
113	27
113	31
\.


--
-- Data for Name: results; Type: TABLE DATA; Schema: public; Owner: ortofit
--

COPY results (id, quiz_id, created) FROM stdin;
1	1	2015-10-09 09:47:57
2	1	2015-10-09 21:39:45
3	1	2015-10-12 07:45:54
4	1	2015-10-12 20:26:05
5	1	2015-10-13 14:14:51
6	1	2015-10-13 15:33:16
7	1	2015-10-14 09:02:17
8	1	2015-10-14 14:04:36
9	1	2015-10-15 20:53:46
10	1	2015-10-16 15:43:57
11	1	2015-10-17 16:11:58
12	1	2015-10-18 01:15:11
13	1	2015-10-20 20:33:50
14	1	2015-10-21 20:15:08
15	1	2015-10-22 22:07:50
16	1	2015-10-23 06:56:27
17	1	2015-10-23 06:57:23
18	1	2015-10-25 14:46:36
19	1	2015-10-25 15:50:39
20	1	2015-10-25 22:14:39
21	1	2015-10-27 11:13:00
22	1	2015-10-27 17:10:43
23	1	2015-10-27 17:11:52
24	1	2015-10-27 20:34:55
25	1	2015-10-29 08:47:47
26	1	2015-10-29 13:08:28
27	1	2015-10-30 15:43:31
28	1	2015-10-30 20:09:17
29	1	2015-10-31 08:22:12
30	1	2015-10-31 10:34:08
31	1	2015-10-31 10:42:42
32	1	2015-10-31 11:14:10
33	1	2015-10-31 12:10:04
34	1	2015-11-01 21:48:58
35	1	2015-11-02 13:23:01
36	1	2015-11-02 13:48:45
37	1	2015-11-02 14:06:54
38	1	2015-11-03 12:15:39
39	1	2015-11-03 15:23:31
40	1	2015-11-04 06:35:35
41	1	2015-11-04 11:39:27
42	1	2015-11-04 15:11:53
43	1	2015-11-05 21:13:47
44	1	2015-11-06 14:21:13
45	1	2015-11-06 15:47:20
46	1	2015-11-06 18:29:10
47	1	2015-11-07 12:04:03
48	1	2015-11-09 10:56:49
49	1	2015-11-09 22:51:34
50	1	2015-11-10 13:42:00
51	1	2015-11-10 13:43:32
52	1	2015-11-11 11:26:33
53	1	2015-11-11 11:32:10
54	1	2015-11-11 11:34:48
55	1	2015-11-11 15:32:41
56	1	2015-11-11 20:02:54
57	1	2015-11-12 17:32:52
58	1	2015-11-13 20:00:50
59	1	2015-11-14 09:22:28
60	1	2015-11-15 11:14:37
61	1	2015-11-15 11:42:10
62	1	2015-11-17 07:58:02
63	1	2015-11-17 11:06:02
64	1	2015-11-17 21:12:07
65	1	2015-11-18 01:14:25
66	1	2015-11-18 08:31:50
67	1	2015-11-18 16:26:14
68	1	2015-11-18 20:23:16
69	1	2015-11-19 13:56:09
70	1	2015-11-20 09:00:35
71	1	2015-11-20 12:58:54
72	1	2015-11-20 15:34:05
73	1	2015-11-21 18:44:28
74	1	2015-11-21 18:45:06
75	1	2015-11-21 18:56:44
76	1	2015-11-23 13:11:40
77	1	2015-11-23 15:47:49
78	1	2015-11-26 23:22:37
79	1	2015-11-28 11:52:00
80	1	2015-11-28 16:17:11
81	1	2015-11-28 17:59:46
82	1	2015-11-28 18:33:31
83	1	2015-11-29 11:40:13
84	1	2015-11-29 11:40:58
85	1	2015-11-29 17:27:41
86	1	2015-11-30 15:48:28
87	1	2015-11-30 15:49:55
88	1	2015-11-30 16:26:31
89	1	2015-11-30 19:41:39
90	1	2015-12-02 16:17:55
91	1	2015-12-02 18:30:08
92	1	2015-12-03 13:38:50
93	1	2015-12-03 16:09:21
94	1	2015-12-03 22:33:22
95	1	2015-12-04 07:16:19
96	1	2015-12-04 08:54:43
97	1	2015-12-04 08:57:28
98	1	2015-12-04 09:18:50
99	1	2015-12-04 09:52:34
100	1	2015-12-05 14:35:33
101	1	2015-12-06 12:43:46
102	1	2015-12-06 17:33:24
103	1	2015-12-08 20:09:30
104	1	2015-12-09 15:01:07
105	1	2015-12-10 12:19:21
106	1	2015-12-11 14:21:47
107	1	2015-12-12 20:33:25
108	1	2015-12-14 13:37:07
109	1	2015-12-15 10:26:13
110	1	2015-12-15 13:46:32
111	1	2015-12-15 14:48:44
112	1	2015-12-16 08:03:01
113	1	2015-12-16 10:20:45
\.


--
-- Name: results_id_seq; Type: SEQUENCE SET; Schema: public; Owner: ortofit
--

SELECT pg_catalog.setval('results_id_seq', 113, true);


--
-- Data for Name: variants; Type: TABLE DATA; Schema: public; Owner: ortofit
--

COPY variants (id, question_id, name, content, index, positive, result, recommendation) FROM stdin;
1	1	А	<img src="/bundles/ortofitquiz/img/feet_1_a.png">	1	t	Нормальный свод стопы	\N
2	1	В	<img src="/bundles/ortofitquiz/img/feet_1_b.png">	2	f	Полая стопа	\N
3	1	С	<img src="/bundles/ortofitquiz/img/feet_1_c.png">	3	f	Вальгусная стопа	\N
4	1	D	<img src="/bundles/ortofitquiz/img/feet_1_d.png">	4	f	Уплощенная стопа	\N
5	1	Е	<img src="/bundles/ortofitquiz/img/feet_1_e.png">	5	f	Плоско-вальгусная стопа	\N
6	2	А	<img src="/bundles/ortofitquiz/img/feet_2_a.png">	1	f	Вальгусное положение заднего отдела стопы	\N
7	2	В	<img src="/bundles/ortofitquiz/img/feet_2_b.png">	2	t	Нормальное положение заднего отдела стопы	\N
8	2	С	<img src="/bundles/ortofitquiz/img/feet_2_c.png">	3	f	Варусное положение заднего отдела стопы	\N
9	3	А	<img src="/bundles/ortofitquiz/img/feet_3_a.png">	1	f	Варус позиция переднего отдела стопы	\N
10	3	В	<img src="/bundles/ortofitquiz/img/feet_3_b.png">	2	t	Норм положение переднего отдела стопы	\N
11	3	С	<img src="/bundles/ortofitquiz/img/feet_3_c.png">	3	f	Вальгус позиция переднего отдела стопы	\N
12	4	А	<img src="/bundles/ortofitquiz/img/feet_4_a.png">	1	f	Приведение переднего отдела стопы	Коррекция индивидуальными ортопедическими стельками со специальным  корректирующим клином в переднем отделе стелек и ортопедическая обувь с удлиненным ребром жесткости по внутренней поверхности стопы до уровня большого пальца (“обувь с антиприведением”)
13	4	В	<img src="/bundles/ortofitquiz/img/feet_4_b.png">	2	t		\N
14	4	С	Нет моего варианта	3	t		\N
15	5	А	<img src="/bundles/ortofitquiz/img/feet_5_a.png">	1	t	Нормальная ось нижних конечностей (“стройные ноги”)	\N
16	5	В	<img src="/bundles/ortofitquiz/img/feet_5_b.png">	2	f	Варусная ось нижних конечностей (“О-образные ноги”)	\N
17	5	С	<img src="/bundles/ortofitquiz/img/feet_5_c.png">	3	f	Вальгусная ось нижних конечностей (“Х-образные ноги”)	\N
18	6	1		1	t		\N
19	6	2		2	t		\N
20	6	3		3	t		\N
21	6	4		4	t		\N
22	6	5		5	t	Выраженный вальгус	\N
23	6	6		6	t	Выраженный  варус	\N
24	7	А	не испытываю	1	t		
25	7	В	болит голова	2	f	Болевой синдром	Консультация врача-невролога
26	7	С	болит спина	3	f	Болевой синдром	Консультация врача-невролога
27	7	D	болят ноги	4	f	Болевой синдром	Индивидуальные ортопедические стельки
28	7	Е	другие боли	5	f	Болевой синдром	Консультация врача-невролога
29	8	А	до 2-х лет	1	t		Профилактическая или ортопедическая обувь
30	8	В	3-5 лет	2	t		Индивидуальные ортопедические стельки и специальная ортопедическая обувь
31	8	С	6-9 лет	3	t		Индивидуальные ортопедические стельки и специальная ортопедическая обувь
32	8	D	10-16 лет	4	t		Индивидуальные ортопедические стельки и специальная ортопедическая обувь
33	8	Е	17-19 лет	5	t		Индивидуальные ортопедические стельки
34	8	F	взрослый	6	t		Индивидуальные ортопедические стельки
\.


--
-- Name: variants_id_seq; Type: SEQUENCE SET; Schema: public; Owner: ortofit
--

SELECT pg_catalog.setval('variants_id_seq', 34, true);


--
-- Name: applications_pkey; Type: CONSTRAINT; Schema: public; Owner: ortofit; Tablespace: 
--

ALTER TABLE ONLY applications
    ADD CONSTRAINT applications_pkey PRIMARY KEY (id);


--
-- Name: clients_pkey; Type: CONSTRAINT; Schema: public; Owner: ortofit; Tablespace: 
--

ALTER TABLE ONLY clients
    ADD CONSTRAINT clients_pkey PRIMARY KEY (id);


--
-- Name: countries_pkey; Type: CONSTRAINT; Schema: public; Owner: ortofit; Tablespace: 
--

ALTER TABLE ONLY countries
    ADD CONSTRAINT countries_pkey PRIMARY KEY (id);


--
-- Name: migration_versions_pkey; Type: CONSTRAINT; Schema: public; Owner: ortofit; Tablespace: 
--

ALTER TABLE ONLY migration_versions
    ADD CONSTRAINT migration_versions_pkey PRIMARY KEY (version);


--
-- Name: questions_pkey; Type: CONSTRAINT; Schema: public; Owner: ortofit; Tablespace: 
--

ALTER TABLE ONLY questions
    ADD CONSTRAINT questions_pkey PRIMARY KEY (id);


--
-- Name: quizzes_pkey; Type: CONSTRAINT; Schema: public; Owner: ortofit; Tablespace: 
--

ALTER TABLE ONLY quizzes
    ADD CONSTRAINT quizzes_pkey PRIMARY KEY (id);


--
-- Name: result_variants_pkey; Type: CONSTRAINT; Schema: public; Owner: ortofit; Tablespace: 
--

ALTER TABLE ONLY result_variants
    ADD CONSTRAINT result_variants_pkey PRIMARY KEY (result_id, variant_id);


--
-- Name: results_pkey; Type: CONSTRAINT; Schema: public; Owner: ortofit; Tablespace: 
--

ALTER TABLE ONLY results
    ADD CONSTRAINT results_pkey PRIMARY KEY (id);


--
-- Name: variants_pkey; Type: CONSTRAINT; Schema: public; Owner: ortofit; Tablespace: 
--

ALTER TABLE ONLY variants
    ADD CONSTRAINT variants_pkey PRIMARY KEY (id);


--
-- Name: idx_149d4c023b69a9af; Type: INDEX; Schema: public; Owner: ortofit; Tablespace: 
--

CREATE INDEX idx_149d4c023b69a9af ON result_variants USING btree (variant_id);


--
-- Name: idx_149d4c027a7b643; Type: INDEX; Schema: public; Owner: ortofit; Tablespace: 
--

CREATE INDEX idx_149d4c027a7b643 ON result_variants USING btree (result_id);


--
-- Name: idx_8adc54d5853cd175; Type: INDEX; Schema: public; Owner: ortofit; Tablespace: 
--

CREATE INDEX idx_8adc54d5853cd175 ON questions USING btree (quiz_id);


--
-- Name: idx_9fa3e414853cd175; Type: INDEX; Schema: public; Owner: ortofit; Tablespace: 
--

CREATE INDEX idx_9fa3e414853cd175 ON results USING btree (quiz_id);


--
-- Name: idx_b39853e11e27f6bf; Type: INDEX; Schema: public; Owner: ortofit; Tablespace: 
--

CREATE INDEX idx_b39853e11e27f6bf ON variants USING btree (question_id);


--
-- Name: idx_c82e74f92f3e70; Type: INDEX; Schema: public; Owner: ortofit; Tablespace: 
--

CREATE INDEX idx_c82e74f92f3e70 ON clients USING btree (country_id);


--
-- Name: idx_f7c966f019eb6921; Type: INDEX; Schema: public; Owner: ortofit; Tablespace: 
--

CREATE INDEX idx_f7c966f019eb6921 ON applications USING btree (client_id);


--
-- Name: fk_149d4c023b69a9af; Type: FK CONSTRAINT; Schema: public; Owner: ortofit
--

ALTER TABLE ONLY result_variants
    ADD CONSTRAINT fk_149d4c023b69a9af FOREIGN KEY (variant_id) REFERENCES variants(id);


--
-- Name: fk_149d4c027a7b643; Type: FK CONSTRAINT; Schema: public; Owner: ortofit
--

ALTER TABLE ONLY result_variants
    ADD CONSTRAINT fk_149d4c027a7b643 FOREIGN KEY (result_id) REFERENCES results(id);


--
-- Name: fk_8adc54d5853cd175; Type: FK CONSTRAINT; Schema: public; Owner: ortofit
--

ALTER TABLE ONLY questions
    ADD CONSTRAINT fk_8adc54d5853cd175 FOREIGN KEY (quiz_id) REFERENCES quizzes(id);


--
-- Name: fk_9fa3e414853cd175; Type: FK CONSTRAINT; Schema: public; Owner: ortofit
--

ALTER TABLE ONLY results
    ADD CONSTRAINT fk_9fa3e414853cd175 FOREIGN KEY (quiz_id) REFERENCES quizzes(id);


--
-- Name: fk_b39853e11e27f6bf; Type: FK CONSTRAINT; Schema: public; Owner: ortofit
--

ALTER TABLE ONLY variants
    ADD CONSTRAINT fk_b39853e11e27f6bf FOREIGN KEY (question_id) REFERENCES questions(id);


--
-- Name: fk_c82e74f92f3e70; Type: FK CONSTRAINT; Schema: public; Owner: ortofit
--

ALTER TABLE ONLY clients
    ADD CONSTRAINT fk_c82e74f92f3e70 FOREIGN KEY (country_id) REFERENCES countries(id);


--
-- Name: fk_f7c966f019eb6921; Type: FK CONSTRAINT; Schema: public; Owner: ortofit
--

ALTER TABLE ONLY applications
    ADD CONSTRAINT fk_f7c966f019eb6921 FOREIGN KEY (client_id) REFERENCES clients(id);


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

