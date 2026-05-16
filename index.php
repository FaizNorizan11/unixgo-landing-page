<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>UnixGo — Campus Superapp</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;1,9..40,300&family=Instrument+Serif:ital@0;1&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css">
<style>
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

:root {
  --teal: #0F6E56;
  --teal-mid: #1D9E75;
  --teal-light: #E1F5EE;
  --teal-glow: #9FE1CB;
  --amber: #BA7517;
  --amber-light: #FAEEDA;
  --coral: #D85A30;
  --coral-light: #FAECE7;
  --ink: #111410;
  --ink-70: rgba(17,20,16,0.7);
  --ink-40: rgba(17,20,16,0.4);
  --ink-15: rgba(17,20,16,0.08);
  --surface: #FAFAF8;
  --white: #ffffff;
  --border: rgba(17,20,16,0.1);
}

html { scroll-behavior: smooth; }

body {
  font-family: 'DM Sans', sans-serif;
  color: var(--ink);
  background: var(--white);
  overflow-x: hidden;
  line-height: 1.6;
  -webkit-font-smoothing: antialiased;
}

/* ── NAV ────────────────────────── */
nav {
  position: fixed; top: 0; left: 0; right: 0; z-index: 100;
  height: 64px;
  display: flex; align-items: center; justify-content: space-between;
  padding: 0 5%;
  background: rgba(255,255,255,0.9);
  backdrop-filter: blur(16px);
  border-bottom: 1px solid var(--border);
  transition: background 0.3s;
}
nav.scrolled { background: rgba(255,255,255,0.97); }

.nav-logo { display: flex; align-items: center; gap: 10px; text-decoration: none; }
.nav-logo-mark {
  width: 34px; height: 34px;
  background: var(--ink);
  border-radius: 9px;
  display: flex; align-items: center; justify-content: center;
  color: white;
  font-family: 'Instrument Serif', serif;
  font-size: 17px; font-style: italic;
  letter-spacing: -0.5px;
}
.nav-logo-text {
  font-size: 17px; font-weight: 600; letter-spacing: -0.03em; color: var(--ink);
}
.nav-logo-text em { font-style: normal; color: var(--teal-mid); }

.nav-links { display: flex; align-items: center; gap: 32px; list-style: none; }
.nav-links a {
  text-decoration: none; font-size: 14px; font-weight: 500;
  color: var(--ink-70); transition: color 0.2s;
}
.nav-links a:hover { color: var(--ink); }

.nav-cta {
  background: var(--ink) !important; color: white !important;
  padding: 8px 18px; border-radius: 50px;
  font-size: 13px !important; font-weight: 600 !important;
  transition: opacity 0.2s !important;
}
.nav-cta:hover { opacity: 0.8 !important; }

.hamburger { display: none; flex-direction: column; gap: 5px; cursor: pointer; }
.hamburger span { width: 22px; height: 1.5px; background: var(--ink); border-radius: 2px; transition: 0.3s; }

/* ── HERO ────────────────────────── */
.hero {
  min-height: 100vh;
  padding: 120px 5% 80px;
  display: grid;
  grid-template-columns: 1.1fr 0.9fr;
  gap: 64px;
  align-items: center;
}

.hero-eyebrow {
  display: inline-flex; align-items: center; gap: 8px;
  font-size: 12px; font-weight: 500; letter-spacing: 0.06em;
  color: var(--teal); text-transform: uppercase;
  margin-bottom: 24px;
}
.eyebrow-dot {
  width: 6px; height: 6px; border-radius: 50%; background: var(--teal-mid);
  animation: blink 2s ease infinite;
}
@keyframes blink { 0%,100%{opacity:1} 50%{opacity:0.3} }

.hero h1 {
  font-family: 'Instrument Serif', serif;
  font-size: clamp(42px, 5.5vw, 72px);
  font-weight: 400;
  line-height: 1.04;
  letter-spacing: -0.02em;
  color: var(--ink);
  margin-bottom: 28px;
}
.hero h1 em {
  font-style: italic;
  color: var(--teal-mid);
}

.hero-desc {
  font-size: 16px; line-height: 1.75;
  color: var(--ink-70); max-width: 460px;
  margin-bottom: 44px;
}

.hero-actions { display: flex; align-items: center; gap: 14px; flex-wrap: wrap; }

.btn-fill {
  display: inline-flex; align-items: center; gap: 8px;
  background: var(--ink); color: white;
  padding: 13px 24px; border-radius: 50px;
  font-size: 14px; font-weight: 600;
  text-decoration: none; transition: opacity 0.2s;
  border: none; cursor: pointer; font-family: 'DM Sans', sans-serif;
}
.btn-fill:hover { opacity: 0.82; }
.btn-fill.amber { background: var(--amber); }

.btn-ghost {
  display: inline-flex; align-items: center; gap: 8px;
  background: transparent; color: var(--ink);
  padding: 12px 22px; border-radius: 50px;
  font-size: 14px; font-weight: 500;
  text-decoration: none;
  border: 1px solid var(--border);
  transition: border-color 0.2s, background 0.2s;
  cursor: pointer; font-family: 'DM Sans', sans-serif;
}
.btn-ghost:hover { border-color: var(--ink-40); background: var(--surface); }

.hero-metrics {
  display: flex; gap: 32px; margin-top: 52px; padding-top: 52px;
  border-top: 1px solid var(--border);
}
.metric-val {
  font-family: 'Instrument Serif', serif;
  font-size: 32px; line-height: 1; color: var(--ink);
  margin-bottom: 4px;
}
.metric-val sup { font-size: 16px; vertical-align: top; margin-top: 6px; display: inline-block; }
.metric-label { font-size: 12px; color: var(--ink-40); letter-spacing: 0.04em; }

/* Hero phone */
.hero-right {
  position: relative; display: flex; align-items: center; justify-content: center;
  height: 580px;
}

.phone {
  width: 234px; height: 480px;
  background: var(--ink);
  border-radius: 36px;
  position: relative;
  box-shadow: 0 32px 64px rgba(0,0,0,0.22), 0 0 0 1px rgba(255,255,255,0.06) inset;
  overflow: hidden;
  z-index: 2;
  animation: hover 4s ease-in-out infinite;
}
@keyframes hover { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-10px)} }

.phone-screen {
  position: absolute; inset: 7px;
  background: #F5F8F4;
  border-radius: 30px; overflow: hidden;
}

.phone-top { padding: 14px 16px 0; }
.phone-pill {
  width: 72px; height: 18px;
  background: var(--ink); border-radius: 10px;
  margin: 0 auto;
}

.phone-header {
  margin: 8px 8px 0;
  background: white;
  border-radius: 16px;
  padding: 12px 14px;
  border: 1px solid rgba(0,0,0,0.06);
}
.phone-header-row { display: flex; align-items: center; justify-content: space-between; }
.phone-logo { font-size: 13px; font-weight: 700; color: var(--teal); letter-spacing: -0.03em; }
.phone-avatar {
  width: 26px; height: 26px; border-radius: 50%;
  background: var(--ink); color: white;
  display: flex; align-items: center; justify-content: center;
  font-size: 9px; font-weight: 700;
}
.phone-hi { font-size: 9px; color: var(--ink-40); margin-top: 3px; }

.phone-grid {
  display: grid; grid-template-columns: 1fr 1fr;
  gap: 7px; padding: 8px;
}
.phone-tile {
  background: white; border-radius: 13px; padding: 10px 9px;
  border: 1px solid rgba(0,0,0,0.06);
}
.tile-ico {
  width: 28px; height: 28px; border-radius: 8px;
  display: flex; align-items: center; justify-content: center;
  margin-bottom: 6px; font-size: 14px;
}
.ico-food { background: #FAEEDA; color: #BA7517; }
.ico-ride { background: #E1F5EE; color: #0F6E56; }
.ico-market { background: #FAECE7; color: #D85A30; }
.ico-run { background: #EAF3DE; color: #3B6D11; }
.tile-name { font-size: 9.5px; font-weight: 700; color: var(--ink); }
.tile-sub { font-size: 8px; color: var(--ink-40); margin-top: 1px; }

.phone-wallet {
  margin: 0 8px 8px;
  background: var(--ink);
  border-radius: 14px; padding: 14px;
}
.wallet-label { font-size: 8px; color: rgba(255,255,255,0.5); font-weight: 600; letter-spacing: 0.06em; margin-bottom: 4px; }
.wallet-amount { font-family: 'Instrument Serif', serif; font-size: 22px; color: white; }
.wallet-sub { font-size: 8px; color: rgba(255,255,255,0.4); margin-top: 3px; }

/* Floating context cards */
.ctx-card {
  position: absolute;
  background: white;
  border-radius: 14px;
  padding: 12px 16px;
  border: 1px solid var(--border);
  box-shadow: 0 8px 24px rgba(0,0,0,0.08);
  z-index: 3;
}
.ctx-1 { top: 80px; left: -10px; }
.ctx-2 { bottom: 100px; right: -16px; }
.ctx-num {
  font-family: 'Instrument Serif', serif;
  font-size: 24px; color: var(--ink); line-height: 1;
}
.ctx-lbl { font-size: 11px; color: var(--ink-40); margin-top: 2px; }
.ctx-ico {
  width: 30px; height: 30px; border-radius: 8px;
  background: var(--teal-light); color: var(--teal);
  display: flex; align-items: center; justify-content: center;
  font-size: 15px; margin-bottom: 8px;
}

/* Background treatment */
.hero-bg {
  position: absolute; inset: 0; z-index: -1; overflow: hidden; pointer-events: none;
}
.hero-bg-dot {
  position: absolute;
  width: 1px; height: 1px;
  background: var(--ink-15);
  border-radius: 50%;
  box-shadow: 0 0 0 0.5px var(--border);
}

/* ── SECTION BASICS ──────────────── */
section { padding: 100px 5%; }

.label {
  display: inline-flex; align-items: center; gap: 8px;
  font-size: 11px; font-weight: 600; letter-spacing: 0.1em;
  text-transform: uppercase; color: var(--teal);
  margin-bottom: 14px;
}
.label i { font-size: 12px; }

h2.section-h {
  font-family: 'Instrument Serif', serif;
  font-size: clamp(32px, 4vw, 52px);
  font-weight: 400; line-height: 1.06; letter-spacing: -0.02em;
  color: var(--ink); margin-bottom: 16px;
}
h2.section-h em { font-style: italic; color: var(--teal-mid); }

.section-p {
  font-size: 15px; color: var(--ink-70); line-height: 1.75; max-width: 540px;
}

/* ── ABOUT ───────────────────────── */
.about { background: var(--surface); }

.about-layout {
  display: grid; grid-template-columns: 1fr 1fr; gap: 64px;
  align-items: start; margin-top: 56px;
}

.story-card {
  background: white; border-radius: 20px;
  padding: 40px; border: 1px solid var(--border);
  position: relative; overflow: hidden;
}
.story-quote {
  position: absolute; top: -16px; right: 20px;
  font-family: 'Instrument Serif', serif; font-style: italic;
  font-size: 160px; line-height: 1; color: var(--ink-15);
  pointer-events: none; user-select: none;
}
.story-tag {
  display: inline-flex; align-items: center; gap: 6px;
  background: var(--teal-light); border-radius: 50px;
  padding: 4px 12px 4px 8px;
  font-size: 11px; font-weight: 600; color: var(--teal);
  margin-bottom: 18px;
}
.story-tag i { font-size: 13px; }
.story-h { font-size: 20px; font-weight: 600; letter-spacing: -0.02em; margin-bottom: 14px; }
.story-p { font-size: 14px; line-height: 1.75; color: var(--ink-70); margin-bottom: 12px; }

.founder {
  display: flex; align-items: center; gap: 12px;
  margin-top: 24px; padding-top: 20px; border-top: 1px solid var(--border);
}
.founder-av {
  width: 40px; height: 40px; border-radius: 50%;
  background: var(--ink); color: white;
  display: flex; align-items: center; justify-content: center;
  font-size: 12px; font-weight: 700;
}
.founder-name { font-size: 13px; font-weight: 600; color: var(--ink); }
.founder-role { font-size: 11px; color: var(--ink-40); }

.pillars { display: flex; flex-direction: column; gap: 16px; }
.pillar {
  background: white; border-radius: 16px; padding: 24px;
  border: 1px solid var(--border); display: flex; gap: 16px;
  align-items: flex-start;
  transition: border-color 0.2s, transform 0.25s;
}
.pillar:hover { border-color: var(--teal-glow); transform: translateX(4px); }
.pillar-ico {
  width: 44px; height: 44px; border-radius: 12px; flex-shrink: 0;
  display: flex; align-items: center; justify-content: center; font-size: 20px;
}
.pillar-ico.t { background: var(--teal-light); color: var(--teal); }
.pillar-ico.a { background: var(--amber-light); color: var(--amber); }
.pillar-ico.c { background: var(--coral-light); color: var(--coral); }
.pillar-h { font-size: 14px; font-weight: 600; letter-spacing: -0.01em; margin-bottom: 4px; }
.pillar-p { font-size: 13px; color: var(--ink-70); line-height: 1.65; }

/* ── VISION ───────────────────────── */
.vision {
  background: var(--ink);
  color: white;
  position: relative; overflow: hidden;
}
.vision .label { color: rgba(255,255,255,0.45); }
.vision h2.section-h { color: white; }
.vision h2.section-h em { color: #9FE1CB; }

.vm-grid {
  display: grid; grid-template-columns: 1fr 1fr; gap: 24px;
  margin-top: 52px;
}
.vm-card {
  background: rgba(255,255,255,0.05);
  border: 1px solid rgba(255,255,255,0.09);
  border-radius: 18px; padding: 36px;
  transition: background 0.2s;
}
.vm-card:hover { background: rgba(255,255,255,0.08); }
.vm-badge {
  display: inline-flex; align-items: center; gap: 6px;
  border-radius: 50px; padding: 4px 12px;
  font-size: 11px; font-weight: 600; letter-spacing: 0.05em;
  text-transform: uppercase; margin-bottom: 18px;
}
.vm-badge.vision-b { background: rgba(29,158,117,0.2); color: #9FE1CB; }
.vm-badge.mission-b { background: rgba(239,159,39,0.2); color: #FAC775; }
.vm-card h3 { font-size: 20px; font-weight: 600; color: white; margin-bottom: 12px; letter-spacing: -0.02em; }
.vm-card p { font-size: 14px; line-height: 1.75; color: rgba(255,255,255,0.6); }

.vm-values {
  grid-column: 1/-1;
  display: grid; grid-template-columns: repeat(4, 1fr); gap: 14px;
}
.val-chip {
  background: rgba(255,255,255,0.04);
  border: 1px solid rgba(255,255,255,0.08);
  border-radius: 14px; padding: 20px 16px;
  text-align: center; transition: background 0.2s;
}
.val-chip:hover { background: rgba(255,255,255,0.08); }
.val-ico {
  width: 40px; height: 40px; border-radius: 10px;
  background: rgba(255,255,255,0.07);
  display: flex; align-items: center; justify-content: center;
  margin: 0 auto 12px; font-size: 20px; color: rgba(255,255,255,0.7);
}
.val-label { font-size: 13px; font-weight: 600; color: rgba(255,255,255,0.85); }

/* ── SERVICES ─────────────────────── */
.services { background: white; }
.services-hd { text-align: center; margin-bottom: 56px; }
.services-hd .label { justify-content: center; }
.services-hd .section-p { margin: 0 auto; }

.svc-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }

.svc-card {
  border-radius: 20px; padding: 36px;
  position: relative; overflow: hidden;
  border: 1px solid transparent;
  transition: transform 0.3s, box-shadow 0.3s;
  text-decoration: none; display: block;
}
.svc-card:hover { transform: translateY(-4px); box-shadow: 0 16px 48px rgba(0,0,0,0.07); }

.svc-food { background: #FFFBF5; border-color: rgba(186,117,23,0.15); }
.svc-ride { background: #F4FDFB; border-color: rgba(15,110,86,0.15); }
.svc-market { background: #FFF8F6; border-color: rgba(216,90,48,0.15); }
.svc-b2b { background: var(--ink); grid-column: 1/-1; }

.svc-ico {
  width: 54px; height: 54px; border-radius: 14px;
  display: flex; align-items: center; justify-content: center;
  font-size: 24px; margin-bottom: 20px;
}
.ico-f { background: var(--amber-light); color: var(--amber); }
.ico-r { background: var(--teal-light); color: var(--teal); }
.ico-m { background: var(--coral-light); color: var(--coral); }
.ico-b { background: rgba(255,255,255,0.1); color: rgba(255,255,255,0.8); }

.svc-tag {
  display: inline-flex; align-items: center; gap: 6px;
  border-radius: 50px; padding: 4px 12px;
  font-size: 11px; font-weight: 600; letter-spacing: 0.05em;
  text-transform: uppercase; margin-bottom: 16px;
}
.tag-f { background: var(--amber-light); color: var(--amber); }
.tag-r { background: var(--teal-light); color: var(--teal); }
.tag-m { background: var(--coral-light); color: var(--coral); }
.tag-b { background: rgba(255,255,255,0.1); color: rgba(255,255,255,0.6); }

.svc-card h3 { font-size: 22px; font-weight: 600; letter-spacing: -0.02em; margin-bottom: 10px; color: var(--ink); }
.svc-b2b h3 { color: white; }
.svc-card > p { font-size: 14px; line-height: 1.7; color: var(--ink-70); margin-bottom: 22px; }
.svc-b2b > p { color: rgba(255,255,255,0.6); }

.pills { display: flex; flex-wrap: wrap; gap: 7px; }
.pill {
  background: rgba(0,0,0,0.05); border-radius: 50px;
  padding: 4px 11px; font-size: 12px; font-weight: 500; color: var(--ink-70);
}
.svc-b2b .pill { background: rgba(255,255,255,0.1); color: rgba(255,255,255,0.7); }

.b2b-inner {
  display: grid; grid-template-columns: 1fr auto; gap: 48px; align-items: center;
}
.b2b-demo {
  background: rgba(255,255,255,0.08);
  border: 1px solid rgba(255,255,255,0.12);
  border-radius: 16px; padding: 28px; text-align: center;
  min-width: 220px;
}
.b2b-demo-h { font-size: 18px; font-weight: 600; color: white; margin-bottom: 6px; }
.b2b-demo-p { font-size: 12px; color: rgba(255,255,255,0.5); line-height: 1.6; margin-bottom: 20px; }
.feat-list { display: flex; flex-direction: column; gap: 10px; }
.feat-item {
  display: flex; align-items: flex-start; gap: 10px;
  font-size: 13px; color: rgba(255,255,255,0.65); line-height: 1.4;
}
.feat-item i { font-size: 15px; color: #9FE1CB; margin-top: 1px; flex-shrink: 0; }

/* ── STATS ────────────────────────── */
.stats-strip { background: var(--teal); padding: 0; }
.stats-inner {
  display: grid; grid-template-columns: repeat(4, 1fr);
  padding: 0 5%;
}
.stat-item {
  padding: 52px 32px;
  text-align: center;
  border-right: 1px solid rgba(255,255,255,0.15);
}
.stat-item:last-child { border-right: none; }
.stat-num {
  font-family: 'Instrument Serif', serif;
  font-size: clamp(36px, 4.5vw, 52px);
  color: white; line-height: 1; margin-bottom: 6px;
}
.stat-num small { font-size: 0.5em; vertical-align: 0.3em; }
.stat-lbl { font-size: 13px; color: rgba(255,255,255,0.65); }

/* ── MODEL ────────────────────────── */
.model { background: var(--surface); }
.model-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 64px; align-items: center; margin-top: 56px; }

.eco-wrap {
  position: relative; height: 400px;
  display: flex; align-items: center; justify-content: center;
}

.roles { display: flex; flex-direction: column; gap: 16px; }
.role-card {
  background: white; border-radius: 16px; padding: 24px;
  border: 1px solid var(--border);
  display: flex; gap: 16px; align-items: flex-start;
  transition: border-color 0.2s, transform 0.25s;
}
.role-card:hover { border-color: var(--teal-glow); transform: translateX(6px); }
.role-ico {
  width: 42px; height: 42px; border-radius: 11px; flex-shrink: 0;
  display: flex; align-items: center; justify-content: center; font-size: 20px;
}
.r-t { background: var(--teal-light); color: var(--teal); }
.r-a { background: var(--amber-light); color: var(--amber); }
.r-c { background: var(--coral-light); color: var(--coral); }
.role-h { font-size: 14px; font-weight: 600; letter-spacing: -0.01em; margin-bottom: 2px; }
.role-sub { font-size: 11px; color: var(--teal); font-weight: 500; margin-bottom: 6px; }
.role-p { font-size: 13px; color: var(--ink-70); line-height: 1.65; }

/* ── TEAM ─────────────────────────── */
.team { background: white; }
.team-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; margin-top: 52px; }
.team-card {
  border: 1px solid var(--border); border-radius: 18px; padding: 28px 20px;
  text-align: center; transition: transform 0.25s, box-shadow 0.25s;
  background: white;
}
.team-card:hover { transform: translateY(-5px); box-shadow: 0 12px 36px rgba(0,0,0,0.06); }
.team-av {
  width: 72px; height: 72px; border-radius: 50%;
  display: flex; align-items: center; justify-content: center;
  font-size: 18px; font-weight: 700; color: white;
  margin: 0 auto 16px;
}
.av1 { background: var(--ink); }
.av2 { background: var(--amber); }
.av3 { background: var(--coral); }
.av4 { background: var(--teal); }
.team-name { font-size: 15px; font-weight: 600; letter-spacing: -0.01em; margin-bottom: 4px; }
.team-role { font-size: 12px; color: var(--teal); font-weight: 600; margin-bottom: 6px; }
.team-uni { font-size: 12px; color: var(--ink-40); line-height: 1.4; }

/* ── CONTACT ──────────────────────── */
.contact { background: var(--surface); }
.contact-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 52px; margin-top: 52px; align-items: start; }

.contact-info {
  background: white; border-radius: 20px;
  padding: 40px; border: 1px solid var(--border);
}
.contact-info-h { font-size: 18px; font-weight: 600; letter-spacing: -0.02em; margin-bottom: 28px; }
.citem {
  display: flex; gap: 14px; align-items: flex-start;
  padding: 16px 0; border-bottom: 1px solid var(--border);
}
.citem:last-child { border-bottom: none; }
.citem-ico {
  width: 38px; height: 38px; border-radius: 10px; flex-shrink: 0;
  background: var(--surface); border: 1px solid var(--border);
  display: flex; align-items: center; justify-content: center;
  font-size: 17px; color: var(--teal);
}
.citem-lbl { font-size: 10px; font-weight: 600; letter-spacing: 0.07em; text-transform: uppercase; color: var(--ink-40); margin-bottom: 3px; }
.citem-val { font-size: 14px; font-weight: 500; color: var(--ink); }

.social-row { display: flex; gap: 8px; margin-top: 24px; padding-top: 20px; border-top: 1px solid var(--border); }
.soc-btn {
  width: 34px; height: 34px; border-radius: 9px;
  background: var(--surface); border: 1px solid var(--border);
  display: flex; align-items: center; justify-content: center;
  color: var(--ink-40); font-size: 16px;
  text-decoration: none; transition: background 0.2s, color 0.2s;
}
.soc-btn:hover { background: var(--ink); color: white; border-color: var(--ink); }

.contact-form-wrap {
  background: white; border-radius: 20px;
  padding: 40px; border: 1px solid var(--border);
}
.form-h { font-size: 18px; font-weight: 600; letter-spacing: -0.02em; margin-bottom: 24px; }
.form-stack { display: flex; flex-direction: column; gap: 14px; }
.fgrp { display: flex; flex-direction: column; gap: 5px; }
.fgrp label { font-size: 12px; font-weight: 600; color: var(--ink-70); letter-spacing: 0.02em; }
.fgrp input, .fgrp textarea, .fgrp select {
  padding: 11px 14px;
  border: 1px solid var(--border);
  border-radius: 10px;
  font-family: 'DM Sans', sans-serif;
  font-size: 14px; color: var(--ink);
  background: white; outline: none;
  transition: border-color 0.2s, box-shadow 0.2s;
  appearance: none;
}
.fgrp input:focus, .fgrp textarea:focus, .fgrp select:focus {
  border-color: var(--teal); box-shadow: 0 0 0 3px rgba(15,110,86,0.1);
}
.fgrp textarea { resize: vertical; min-height: 110px; }

/* ── FOOTER ───────────────────────── */
footer { background: var(--ink); color: white; padding: 64px 5% 28px; }
.footer-top {
  display: grid; grid-template-columns: 2fr 1fr 1fr 1fr; gap: 40px;
  padding-bottom: 48px; border-bottom: 1px solid rgba(255,255,255,0.07);
}
.footer-brand { font-size: 22px; font-weight: 700; letter-spacing: -0.04em; margin-bottom: 8px; }
.footer-brand em { font-style: normal; color: #9FE1CB; }
.footer-sub { font-size: 13px; color: rgba(255,255,255,0.38); line-height: 1.65; margin-bottom: 22px; }
.footer-col-h { font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; color: rgba(255,255,255,0.4); margin-bottom: 16px; }
.footer-links { list-style: none; display: flex; flex-direction: column; gap: 9px; }
.footer-links a { text-decoration: none; font-size: 14px; color: rgba(255,255,255,0.5); transition: color 0.2s; }
.footer-links a:hover { color: rgba(255,255,255,0.9); }
.footer-bottom {
  display: flex; justify-content: space-between; align-items: center;
  padding-top: 24px; flex-wrap: wrap; gap: 10px;
}
.footer-copy { font-size: 12px; color: rgba(255,255,255,0.28); }
.footer-copy em { color: #9FE1CB; font-style: normal; }
.footer-pill {
  background: rgba(29,158,117,0.15);
  border: 1px solid rgba(29,158,117,0.25);
  border-radius: 50px; padding: 4px 12px;
  font-size: 11px; font-weight: 600; color: #9FE1CB;
  display: flex; align-items: center; gap: 6px;
}

/* ── ANIMATIONS ────────────────────── */
.reveal { opacity: 0; transform: translateY(28px); transition: opacity 0.65s ease, transform 0.65s ease; }
.reveal.in { opacity: 1; transform: translateY(0); }
.d1 { transition-delay: 0.1s; }
.d2 { transition-delay: 0.2s; }
.d3 { transition-delay: 0.3s; }
.d4 { transition-delay: 0.4s; }

/* ── MOBILE MENU ────────────────────── */
.mob-menu {
  display: none; position: fixed; top: 64px; left: 0; right: 0;
  background: rgba(255,255,255,0.97); backdrop-filter: blur(16px);
  padding: 12px 5%; z-index: 99;
  flex-direction: column; gap: 2px;
  border-bottom: 1px solid var(--border);
}
.mob-menu.open { display: flex; }
.mob-menu a {
  text-decoration: none; font-size: 15px; font-weight: 500;
  color: var(--ink); padding: 12px 14px; border-radius: 10px;
  transition: background 0.2s;
}
.mob-menu a:hover { background: var(--surface); }

/* ── RESPONSIVE ─────────────────────── */
@media (max-width: 1024px) {
  .hero { grid-template-columns: 1fr; text-align: center; }
  .hero-desc { margin-left: auto; margin-right: auto; }
  .hero-actions { justify-content: center; }
  .hero-metrics { justify-content: center; }
  .hero-right { height: 360px; }
  .about-layout { grid-template-columns: 1fr; gap: 32px; }
  .vm-grid { grid-template-columns: 1fr; }
  .vm-values { grid-template-columns: repeat(2,1fr); }
  .svc-grid { grid-template-columns: 1fr; }
  .svc-b2b { grid-column: auto; }
  .b2b-inner { grid-template-columns: 1fr; }
  .stats-inner { grid-template-columns: 1fr 1fr; }
  .stat-item { border-right: none; border-bottom: 1px solid rgba(255,255,255,0.15); }
  .stat-item:nth-child(odd) { border-right: 1px solid rgba(255,255,255,0.15); }
  .model-grid { grid-template-columns: 1fr; }
  .team-grid { grid-template-columns: 1fr 1fr; }
  .contact-grid { grid-template-columns: 1fr; }
  .footer-top { grid-template-columns: 1fr 1fr; gap: 28px; }
}

@media (max-width: 640px) {
  section { padding: 72px 5%; }
  .nav-links { display: none; }
  .hamburger { display: flex; }
  .hero { padding-top: 100px; }
  .hero h1 { font-size: 36px; }
  .hero-right { height: 280px; }
  .phone { width: 175px; height: 360px; }
  .ctx-card { display: none; }
  .vm-values { grid-template-columns: 1fr 1fr; }
  .stats-inner { grid-template-columns: 1fr 1fr; }
  .team-grid { grid-template-columns: 1fr 1fr; }
  .footer-top { grid-template-columns: 1fr; }
  .footer-bottom { flex-direction: column; text-align: center; }
}
</style>
</head>
<body>

<!-- NAV -->
<nav id="nav">
  <a href="#" class="nav-logo">
    <div class="nav-logo-mark">U</div>
    <span class="nav-logo-text">Unix<em>Go</em></span>
  </a>
  <ul class="nav-links">
    <li><a href="#about">About</a></li>
    <li><a href="#services">Services</a></li>
    <li><a href="#model">Ecosystem</a></li>
    <li><a href="#team">Team</a></li>
    <li><a href="#contact" class="nav-cta">Get in Touch</a></li>
  </ul>
  <div class="hamburger" id="hbg" onclick="toggleMenu()">
    <span></span><span></span><span></span>
  </div>
</nav>

<div class="mob-menu" id="mob">
  <a href="#about" onclick="toggleMenu()">About</a>
  <a href="#services" onclick="toggleMenu()">Services</a>
  <a href="#model" onclick="toggleMenu()">Ecosystem</a>
  <a href="#team" onclick="toggleMenu()">Team</a>
  <a href="#contact" onclick="toggleMenu()">Contact</a>
</div>

<!-- HERO -->
<section class="hero" id="home">
  <div>
    <div class="hero-eyebrow">
      <span class="eyebrow-dot"></span>
      Malaysia's Campus Superapp
    </div>

    <h1>Your campus,<br>your <em>community.</em><br>We get it.</h1>

    <p class="hero-desc">UnixGo is the all-in-one campus platform born from the dorms of UMP — built so students can eat, ride, shop, and earn without ever leaving campus life.</p>

    <div class="hero-actions">
      <a href="#services" class="btn-fill amber">
        Explore the app
        <i class="ti ti-arrow-right" aria-hidden="true"></i>
      </a>
      <a href="#about" class="btn-ghost">
        Our story
        <i class="ti ti-arrow-right" aria-hidden="true"></i>
      </a>
    </div>

    <div class="hero-metrics">
      <div>
        <div class="metric-val">5k<sup>+</sup></div>
        <div class="metric-label">Active students</div>
      </div>
      <div>
        <div class="metric-val">300<sup>+</sup></div>
        <div class="metric-label">Campus vendors</div>
      </div>
      <div>
        <div class="metric-val">RM80k</div>
        <div class="metric-label">Revenue generated</div>
      </div>
    </div>
  </div>

  <div class="hero-right">
    <!-- Phone mockup -->
    <div class="phone">
      <div class="phone-screen">
        <div class="phone-top">
          <div class="phone-pill"></div>
        </div>
        <div class="phone-header">
          <div class="phone-header-row">
            <span class="phone-logo">UnixGo</span>
            <div class="phone-avatar">AH</div>
          </div>
          <div class="phone-hi">Good morning, Ahmad &mdash; what's the plan today?</div>
        </div>
        <div class="phone-grid">
          <div class="phone-tile">
            <div class="tile-ico ico-food"><i class="ti ti-tools-kitchen-2" aria-hidden="true"></i></div>
            <div class="tile-name">UnixFood</div>
            <div class="tile-sub">Campus delivery</div>
          </div>
          <div class="phone-tile">
            <div class="tile-ico ico-ride"><i class="ti ti-motorbike" aria-hidden="true"></i></div>
            <div class="tile-name">UnixRide</div>
            <div class="tile-sub">Book a ride</div>
          </div>
          <div class="phone-tile">
            <div class="tile-ico ico-market"><i class="ti ti-shopping-bag" aria-hidden="true"></i></div>
            <div class="tile-name">UnixMarket</div>
            <div class="tile-sub">Student market</div>
          </div>
          <div class="phone-tile">
            <div class="tile-ico ico-run"><i class="ti ti-run" aria-hidden="true"></i></div>
            <div class="tile-name">UnixRun</div>
            <div class="tile-sub">Run errands</div>
          </div>
        </div>
        <div class="phone-wallet">
          <div class="wallet-label">YOUR WALLET</div>
          <div class="wallet-amount">RM 47.50</div>
          <div class="wallet-sub">3 orders this week</div>
        </div>
      </div>
    </div>

    <!-- Floating context cards -->
    <div class="ctx-card ctx-1">
      <div class="ctx-ico">
        <i class="ti ti-users" aria-hidden="true"></i>
      </div>
      <div class="ctx-num">5,000+</div>
      <div class="ctx-lbl">Active users</div>
    </div>
    <div class="ctx-card ctx-2">
      <div class="ctx-ico">
        <i class="ti ti-store" aria-hidden="true"></i>
      </div>
      <div class="ctx-num">300+</div>
      <div class="ctx-lbl">Campus vendors</div>
    </div>
  </div>
</section>

<!-- ABOUT -->
<section class="about" id="about">
  <div class="label"><i class="ti ti-book-2" aria-hidden="true"></i> Our Story</div>
  <h2 class="section-h">Built in a dorm room.<br>Scaled for <em>every campus.</em></h2>

  <div class="about-layout">
    <div class="story-card reveal">
      <div class="story-quote">"</div>
      <div class="story-tag">
        <i class="ti ti-building" aria-hidden="true"></i>
        Founded at UMP
      </div>
      <div class="story-h">A student idea that became a campus movement</div>
      <p class="story-p">It started with a simple frustration — getting food delivered across a sprawling campus with no real digital solution. Our founders, students at Universiti Malaysia Pahang, decided to build the fix themselves from their dormitory.</p>
      <p class="story-p">What began as a WhatsApp-order food service quickly evolved into a full-stack campus superapp serving thousands of students, faculty, and vendors. UnixGo isn't just built for students — it's built by students who understood the problem from the inside.</p>
      <div class="founder">
        <div class="founder-av">FA</div>
        <div>
          <div class="founder-name">Fariz Azlan</div>
          <div class="founder-role">Co-Founder &amp; CEO, UnixGo</div>
        </div>
      </div>
    </div>

    <div class="pillars">
      <div class="pillar reveal d1">
        <div class="pillar-ico t"><i class="ti ti-school" aria-hidden="true"></i></div>
        <div>
          <div class="pillar-h">Student-led innovation</div>
          <div class="pillar-p">Every feature, every flow is designed by students who live the campus experience daily — no outsider assumptions.</div>
        </div>
      </div>
      <div class="pillar reveal d2">
        <div class="pillar-ico a"><i class="ti ti-handshake" aria-hidden="true"></i></div>
        <div>
          <div class="pillar-h">Community-first model</div>
          <div class="pillar-p">We empower local student vendors to grow real businesses, creating a circular economy within campus walls.</div>
        </div>
      </div>
      <div class="pillar reveal d3">
        <div class="pillar-ico c"><i class="ti ti-rocket" aria-hidden="true"></i></div>
        <div>
          <div class="pillar-h">Scalable across Malaysia</div>
          <div class="pillar-p">Launched at UMP, UnixGo is designed to replicate across universities, polytechnics, and campuses nationwide.</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- VISION & MISSION -->
<section class="vision" id="vision">
  <div class="label"><i class="ti ti-target" aria-hidden="true"></i> Purpose &amp; Direction</div>
  <h2 class="section-h">Empowering every<br><em>campus community</em></h2>

  <div class="vm-grid">
    <div class="vm-card reveal">
      <div class="vm-badge vision-b">
        <i class="ti ti-telescope" aria-hidden="true"></i>
        Vision
      </div>
      <h3>The super-app for every Malaysian campus</h3>
      <p>To become the definitive digital campus platform across all Malaysian universities — a seamless ecosystem where students discover services, earn income, and connect with their institution through one trusted app.</p>
    </div>
    <div class="vm-card reveal d1">
      <div class="vm-badge mission-b">
        <i class="ti ti-flag" aria-hidden="true"></i>
        Mission
      </div>
      <h3>Digitise. Empower. Grow together.</h3>
      <p>To digitise everyday campus transactions, reduce friction for students and vendors, and enable a new generation of student entrepreneurs to build sustainable micro-businesses — through technology that's accessible, fair, and student-owned.</p>
    </div>
    <div class="vm-values">
      <div class="val-chip reveal">
        <div class="val-ico"><i class="ti ti-bolt" aria-hidden="true"></i></div>
        <div class="val-label">Innovation first</div>
      </div>
      <div class="val-chip reveal d1">
        <div class="val-ico"><i class="ti ti-plant-2" aria-hidden="true"></i></div>
        <div class="val-label">Student growth</div>
      </div>
      <div class="val-chip reveal d2">
        <div class="val-ico"><i class="ti ti-shield-check" aria-hidden="true"></i></div>
        <div class="val-label">Trust &amp; safety</div>
      </div>
      <div class="val-chip reveal d3">
        <div class="val-ico"><i class="ti ti-world" aria-hidden="true"></i></div>
        <div class="val-label">Local impact</div>
      </div>
    </div>
  </div>
</section>

<!-- SERVICES -->
<section class="services" id="services">
  <div class="services-hd">
    <div class="label"><i class="ti ti-layout-grid" aria-hidden="true"></i> What We Offer</div>
    <h2 class="section-h">Four modules.<br>One <em>superapp.</em></h2>
    <p class="section-p">Every service built specifically for the campus lifestyle — fast, affordable, and student-powered.</p>
  </div>

  <div class="svc-grid">
    <div class="svc-card svc-food reveal">
      <div class="svc-ico ico-f"><i class="ti ti-tools-kitchen-2" aria-hidden="true"></i></div>
      <div class="svc-tag tag-f">
        <i class="ti ti-tools-kitchen-2" aria-hidden="true"></i>
        UnixFood
      </div>
      <h3>Campus food delivery</h3>
      <p>Order from student-run stalls and campus cafeterias — hot food delivered to your hostel, library, or lecture hall in minutes.</p>
      <div class="pills">
        <span class="pill">Live tracking</span>
        <span class="pill">Student vendors</span>
        <span class="pill">Schedule orders</span>
        <span class="pill">RM 0 delivery</span>
      </div>
    </div>

    <div class="svc-card svc-ride reveal d1">
      <div class="svc-ico ico-r"><i class="ti ti-motorbike" aria-hidden="true"></i></div>
      <div class="svc-tag tag-r">
        <i class="ti ti-motorbike" aria-hidden="true"></i>
        UnixRide
      </div>
      <h3>Campus ride sharing</h3>
      <p>Book affordable rides around and off campus — powered by fellow students on verified campus accounts.</p>
      <div class="pills">
        <span class="pill">Instant booking</span>
        <span class="pill">Verified riders</span>
        <span class="pill">In-app payment</span>
        <span class="pill">Safe routes</span>
      </div>
    </div>

    <div class="svc-card svc-market reveal d2">
      <div class="svc-ico ico-m"><i class="ti ti-shopping-bag" aria-hidden="true"></i></div>
      <div class="svc-tag tag-m">
        <i class="ti ti-shopping-bag" aria-hidden="true"></i>
        UnixMarket
      </div>
      <h3>Student marketplace</h3>
      <p>Buy and sell secondhand textbooks, gadgets, services, and handmade goods — a trusted peer-to-peer marketplace exclusive to campus.</p>
      <div class="pills">
        <span class="pill">Verified buyers</span>
        <span class="pill">Escrow payment</span>
        <span class="pill">Campus pickup</span>
        <span class="pill">Zero commission</span>
      </div>
    </div>

    <div class="svc-card svc-b2b reveal d3" style="grid-column: 1 / -1;">
      <div class="svc-tag tag-b">
        <i class="ti ti-building-skyscraper" aria-hidden="true"></i>
        UnixGo Solution — B2B Enterprise
      </div>
      <div class="b2b-inner">
        <div>
          <h3>The institutional platform</h3>
          <p>UnixGo Solution is our white-label enterprise offering for universities, polytechnics, and campus management bodies — a comprehensive digital campus operations platform.</p>
          <div class="feat-list" style="margin-top: 20px;">
            <div class="feat-item"><i class="ti ti-check" aria-hidden="true"></i> Vendor &amp; stall management dashboard</div>
            <div class="feat-item"><i class="ti ti-check" aria-hidden="true"></i> Student transaction analytics &amp; reporting</div>
            <div class="feat-item"><i class="ti ti-check" aria-hidden="true"></i> Digital campus card &amp; wallet integration</div>
            <div class="feat-item"><i class="ti ti-check" aria-hidden="true"></i> Custom branded app for institutions</div>
            <div class="feat-item"><i class="ti ti-check" aria-hidden="true"></i> API-first architecture for existing systems</div>
          </div>
        </div>
        <div class="b2b-demo">
          <div style="width:52px;height:52px;border-radius:14px;background:rgba(255,255,255,0.1);display:flex;align-items:center;justify-content:center;margin:0 auto 16px;font-size:26px;color:rgba(255,255,255,0.7);">
            <i class="ti ti-building-community" aria-hidden="true"></i>
          </div>
          <div class="b2b-demo-h">Partner with us</div>
          <div class="b2b-demo-p">Built for Malaysian public universities, private colleges &amp; polytechnics</div>
          <a href="#contact" class="btn-fill amber" style="width:100%;justify-content:center;font-size:13px;">
            Book a demo
            <i class="ti ti-arrow-right" aria-hidden="true"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- STATS -->
<div class="stats-strip">
  <div class="stats-inner">
    <div class="stat-item reveal">
      <div class="stat-num">RM 80k</div>
      <div class="stat-lbl">Total vendor revenue generated</div>
    </div>
    <div class="stat-item reveal d1">
      <div class="stat-num">5,000<small>+</small></div>
      <div class="stat-lbl">Active student users</div>
    </div>
    <div class="stat-item reveal d2">
      <div class="stat-num">300<small>+</small></div>
      <div class="stat-lbl">Registered campus vendors</div>
    </div>
    <div class="stat-item reveal d3">
      <div class="stat-num">1<small>st</small></div>
      <div class="stat-lbl">Campus superapp in Pahang</div>
    </div>
  </div>
</div>

<!-- BUSINESS MODEL -->
<section class="model" id="model">
  <div class="label"><i class="ti ti-circuit-cell" aria-hidden="true"></i> How It Works</div>
  <h2 class="section-h">Students as consumers.<br>Students as <em>providers.</em></h2>
  <p class="section-p">The same student who orders lunch on UnixFood can open a stall and earn income selling it.</p>

  <div class="model-grid">
    <div class="eco-wrap reveal">
      <svg viewBox="0 0 380 380" xmlns="http://www.w3.org/2000/svg" style="width:100%;max-width:380px;height:auto;">
        <circle cx="190" cy="190" r="145" fill="none" stroke="rgba(15,110,86,0.1)" stroke-width="1" stroke-dasharray="6 5"/>
        <circle cx="190" cy="190" r="90" fill="none" stroke="rgba(15,110,86,0.15)" stroke-width="1" stroke-dasharray="4 4"/>

        <!-- Center -->
        <circle cx="190" cy="190" r="52" fill="#111410"/>
        <text x="190" y="186" text-anchor="middle" font-family="Instrument Serif,serif" font-style="italic" font-size="15" fill="white">Unix</text>
        <text x="190" y="204" text-anchor="middle" font-family="Instrument Serif,serif" font-style="italic" font-size="15" fill="#9FE1CB">Go</text>

        <!-- Lines -->
        <line x1="190" y1="138" x2="190" y2="72" stroke="rgba(15,110,86,0.3)" stroke-width="1.5" stroke-dasharray="4 3"/>
        <line x1="242" y1="190" x2="316" y2="190" stroke="rgba(15,110,86,0.3)" stroke-width="1.5" stroke-dasharray="4 3"/>
        <line x1="190" y1="242" x2="190" y2="316" stroke="rgba(15,110,86,0.3)" stroke-width="1.5" stroke-dasharray="4 3"/>
        <line x1="138" y1="190" x2="64" y2="190" stroke="rgba(15,110,86,0.3)" stroke-width="1.5" stroke-dasharray="4 3"/>

        <!-- Top — Students -->
        <rect x="138" y="20" width="104" height="50" rx="11" fill="#E1F5EE" stroke="rgba(15,110,86,0.2)" stroke-width="1"/>
        <text x="190" y="40" text-anchor="middle" font-family="DM Sans,sans-serif" font-weight="600" font-size="11" fill="#085041">Students</text>
        <text x="190" y="56" text-anchor="middle" font-family="DM Sans,sans-serif" font-size="9" fill="#0F6E56">as Consumers</text>

        <!-- Right — Vendors -->
        <rect x="320" y="162" width="52" height="56" rx="11" fill="#FAEEDA" stroke="rgba(186,117,23,0.25)" stroke-width="1"/>
        <text x="346" y="186" text-anchor="middle" font-family="DM Sans,sans-serif" font-weight="600" font-size="10" fill="#633806">Vendors</text>
        <text x="346" y="200" text-anchor="middle" font-family="DM Sans,sans-serif" font-size="8" fill="#BA7517">&amp; Earners</text>

        <!-- Bottom — Modules -->
        <rect x="134" y="322" width="112" height="50" rx="11" fill="#FAECE7" stroke="rgba(216,90,48,0.2)" stroke-width="1"/>
        <text x="190" y="342" text-anchor="middle" font-family="DM Sans,sans-serif" font-weight="600" font-size="11" fill="#4A1B0C">4 Modules</text>
        <text x="190" y="358" text-anchor="middle" font-family="DM Sans,sans-serif" font-size="8" fill="#993C1D">Food · Ride · Market · Run</text>

        <!-- Left — Institutions -->
        <rect x="8" y="158" width="52" height="64" rx="11" fill="#F4FDFB" stroke="rgba(15,110,86,0.2)" stroke-width="1"/>
        <text x="34" y="182" text-anchor="middle" font-family="DM Sans,sans-serif" font-weight="600" font-size="10" fill="#04342C">Campus</text>
        <text x="34" y="197" text-anchor="middle" font-family="DM Sans,sans-serif" font-size="8" fill="#0F6E56">Partners</text>
        <text x="34" y="211" text-anchor="middle" font-family="DM Sans,sans-serif" font-size="8" fill="#1D9E75">&amp; Unis</text>
      </svg>
    </div>

    <div class="roles">
      <div class="role-card reveal">
        <div class="role-ico r-t"><i class="ti ti-user" aria-hidden="true"></i></div>
        <div>
          <div class="role-h">The consumer role</div>
          <div class="role-sub">Every student on campus</div>
          <div class="role-p">Students use UnixGo to order food, book rides, buy marketplace items, and delegate errands — all from one app, all within campus. We make daily campus life frictionless.</div>
        </div>
      </div>
      <div class="role-card reveal d1">
        <div class="role-ico r-a"><i class="ti ti-briefcase" aria-hidden="true"></i></div>
        <div>
          <div class="role-h">The provider role</div>
          <div class="role-sub">Student entrepreneurs &amp; earners</div>
          <div class="role-p">The same students can register as vendors, riders, runners, or sellers — building real income streams from their campus community. UnixGo is a launchpad for student micro-businesses.</div>
        </div>
      </div>
      <div class="role-card reveal d2">
        <div class="role-ico r-c"><i class="ti ti-building-bank" aria-hidden="true"></i></div>
        <div>
          <div class="role-h">The institutional layer</div>
          <div class="role-sub">UnixGo Solution for campuses</div>
          <div class="role-p">Universities and colleges partner with us to digitise campus services, track transactions, and deploy a branded campus superapp — powered by UnixGo's infrastructure.</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- TEAM -->
<section class="team" id="team">
  <div class="label"><i class="ti ti-users" aria-hidden="true"></i> The People</div>
  <h2 class="section-h">Meet the <em>founding</em> team</h2>
  <p class="section-p">Student entrepreneurs who turned dorm-room frustrations into a full-stack campus platform.</p>

  <div class="team-grid">
    <div class="team-card reveal">
      <div class="team-av av1">FA</div>
      <div class="team-name">Fariz Azlan</div>
      <div class="team-role">CEO &amp; Co-Founder</div>
      <div class="team-uni">Computer Science, Universiti Malaysia Pahang</div>
    </div>
    <div class="team-card reveal d1">
      <div class="team-av av2">AH</div>
      <div class="team-name">Amirul Haziq</div>
      <div class="team-role">CTO &amp; Co-Founder</div>
      <div class="team-uni">Software Engineering, UMP</div>
    </div>
    <div class="team-card reveal d2">
      <div class="team-av av3">NZ</div>
      <div class="team-name">Nurizzah</div>
      <div class="team-role">Head of Operations</div>
      <div class="team-uni">Business Administration, UMP</div>
    </div>
    <div class="team-card reveal d3">
      <div class="team-av av4">MR</div>
      <div class="team-name">Mohd Ridzwan</div>
      <div class="team-role">Head of Growth</div>
      <div class="team-uni">Marketing, UMP</div>
    </div>
  </div>
</section>

<!-- CONTACT -->
<section class="contact" id="contact">
  <div class="label"><i class="ti ti-message-circle" aria-hidden="true"></i> Reach Out</div>
  <h2 class="section-h">Let's build the <em>future</em><br>of campuses together</h2>
  <p class="section-p">Whether you're a student, vendor, investor, or campus administrator — we'd love to hear from you.</p>

  <div class="contact-grid">
    <div class="contact-info reveal">
      <div class="contact-info-h">Contact details</div>
      <div class="citem">
        <div class="citem-ico"><i class="ti ti-mail" aria-hidden="true"></i></div>
        <div>
          <div class="citem-lbl">Email</div>
          <div class="citem-val">hello@unixgo.com</div>
        </div>
      </div>
      <div class="citem">
        <div class="citem-ico"><i class="ti ti-map-pin" aria-hidden="true"></i></div>
        <div>
          <div class="citem-lbl">Headquarters</div>
          <div class="citem-val">Universiti Malaysia Pahang, Gambang, Pahang</div>
        </div>
      </div>
      <div class="citem">
        <div class="citem-ico"><i class="ti ti-brand-whatsapp" aria-hidden="true"></i></div>
        <div>
          <div class="citem-lbl">WhatsApp Business</div>
          <div class="citem-val">+60 11-XXXX XXXX</div>
        </div>
      </div>
      <div class="citem">
        <div class="citem-ico"><i class="ti ti-building" aria-hidden="true"></i></div>
        <div>
          <div class="citem-lbl">For Institutions</div>
          <div class="citem-val">solution@unixgo.com</div>
        </div>
      </div>
      <div class="social-row">
        <a href="#" class="soc-btn" aria-label="LinkedIn"><i class="ti ti-brand-linkedin" aria-hidden="true"></i></a>
        <a href="#" class="soc-btn" aria-label="Instagram"><i class="ti ti-brand-instagram" aria-hidden="true"></i></a>
        <a href="#" class="soc-btn" aria-label="X / Twitter"><i class="ti ti-brand-x" aria-hidden="true"></i></a>
        <a href="#" class="soc-btn" aria-label="Facebook"><i class="ti ti-brand-facebook" aria-hidden="true"></i></a>
      </div>
    </div>

    <div class="contact-form-wrap reveal d1">
      <div class="form-h">Send us a message</div>
      <div class="form-stack">
        <div class="fgrp">
          <label>Full name</label>
          <input type="text" placeholder="e.g. Ahmad Fadhil">
        </div>
        <div class="fgrp">
          <label>Email address</label>
          <input type="email" placeholder="your@email.com">
        </div>
        <div class="fgrp">
          <label>I am a&hellip;</label>
          <select>
            <option value="">Select your role</option>
            <option>Student / User</option>
            <option>Vendor / Entrepreneur</option>
            <option>University Representative</option>
            <option>Investor / Partner</option>
            <option>Media / Press</option>
          </select>
        </div>
        <div class="fgrp">
          <label>Message</label>
          <textarea placeholder="Tell us what you have in mind…"></textarea>
        </div>
        <button class="btn-fill amber" style="width:100%;justify-content:center;margin-top:4px;">
          Send message
          <i class="ti ti-send" aria-hidden="true"></i>
        </button>
      </div>
    </div>
  </div>
</section>

<!-- FOOTER -->
<footer>
  <div class="footer-top">
    <div>
      <div class="footer-brand">Unix<em>Go</em></div>
      <div class="footer-sub">Malaysia's Campus Superapp.<br>Built by students, for students.</div>
      <div class="social-row">
        <a href="#" class="soc-btn" aria-label="LinkedIn"><i class="ti ti-brand-linkedin" aria-hidden="true"></i></a>
        <a href="#" class="soc-btn" aria-label="Instagram"><i class="ti ti-brand-instagram" aria-hidden="true"></i></a>
        <a href="#" class="soc-btn" aria-label="X"><i class="ti ti-brand-x" aria-hidden="true"></i></a>
        <a href="#" class="soc-btn" aria-label="Facebook"><i class="ti ti-brand-facebook" aria-hidden="true"></i></a>
      </div>
    </div>
    <div>
      <div class="footer-col-h">Platform</div>
      <ul class="footer-links">
        <li><a href="#services">UnixFood</a></li>
        <li><a href="#services">UnixRide</a></li>
        <li><a href="#services">UnixMarket</a></li>
        <li><a href="#services">UnixRun</a></li>
        <li><a href="#services">UnixGo Solution</a></li>
      </ul>
    </div>
    <div>
      <div class="footer-col-h">Company</div>
      <ul class="footer-links">
        <li><a href="#about">About us</a></li>
        <li><a href="#vision">Vision &amp; Mission</a></li>
        <li><a href="#team">Our team</a></li>
        <li><a href="#model">Business model</a></li>
        <li><a href="#contact">Careers</a></li>
      </ul>
    </div>
    <div>
      <div class="footer-col-h">Contact</div>
      <ul class="footer-links">
        <li><a href="mailto:hello@unixgo.com">hello@unixgo.com</a></li>
        <li><a href="mailto:solution@unixgo.com">solution@unixgo.com</a></li>
        <li><a href="#contact">WhatsApp us</a></li>
        <li><a href="#contact">Book a demo</a></li>
        <li><a href="#contact">Press enquiries</a></li>
      </ul>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="footer-copy">&copy; 2025 UnixGo Technologies Sdn Bhd. Made with care in <em>Malaysia</em>.</div>
    <div class="footer-pill">
      <i class="ti ti-map-pin" aria-hidden="true"></i>
      Proudly Malaysian
    </div>
  </div>
</footer>

<script>
const nav = document.getElementById('nav');
window.addEventListener('scroll', () => nav.classList.toggle('scrolled', scrollY > 40));

function toggleMenu() {
  document.getElementById('mob').classList.toggle('open');
}

const observer = new IntersectionObserver(entries => {
  entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('in'); observer.unobserve(e.target); } });
}, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });

document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

document.querySelectorAll('a[href^="#"]').forEach(a => {
  a.addEventListener('click', e => {
    const t = document.querySelector(a.getAttribute('href'));
    if (t) { e.preventDefault(); t.scrollIntoView({ behavior: 'smooth' }); }
  });
});
</script>
</body>
</html>
