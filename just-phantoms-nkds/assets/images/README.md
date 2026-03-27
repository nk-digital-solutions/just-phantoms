# Image Organization Guide

This folder contains all the images for the Just Phantoms website. Here's how to organize them:

## Folder Structure

### `/images/fleet/`
Store all vehicle images here:
- `phantom.jpg` - Rolls-Royce Phantom images
- `ghost.jpg` - Rolls-Royce Ghost images  
- `limo.jpg` - Limousine images
- `vintage.jpg` - Vintage/classic car images
- `executive.jpg` - Executive sedan images
- `performance.jpg` - Performance car images

### `/images/services/`
Store service-related images here:
- `wedding.jpg` - Wedding service images
- `prom.jpg` - Prom service images
- `music-video.jpg` - Music video/photoshoot images
- `chauffeur.jpg` - Chauffeur service images
- `self-drive.jpg` - Self-drive service images
- `airport.jpg` - Airport transfer images
- `events.jpg` - Events/photoshoot images

### `/images/hero/`
Store hero/background images here:
- `hero-bg.jpg` - Main hero background image

### `/images/logos/`
Store logo files here:
- `logo.png` - Main Just Phantoms logo
- `logo-white.png` - White version of logo (if needed)

## Image Guidelines

### File Formats
- Use `.jpg` for photos (smaller file sizes)
- Use `.png` for logos and images with transparency
- Use `.webp` for modern browsers (optional, for better performance)

### Image Sizes
- **Hero images**: 1920x1080px or larger
- **Fleet cards**: 800x500px (16:10 aspect ratio)
- **Service cards**: 600x400px 
- **Logos**: SVG preferred, or PNG at 200x60px for header

### File Naming
- Use lowercase letters
- Use hyphens instead of spaces
- Be descriptive: `phantom-exterior.jpg` not `car1.jpg`

## How to Replace External Links

Once you add images to these folders, update your HTML files:

**Before:**
```html
<img src="https://images.unsplash.com/photo-1545243424-0ce743321e11?q=80&w=1600&auto=format&fit=crop" alt="Rolls‑Royce Phantom"/>
```

**After:**
```html
<img src="images/fleet/phantom.jpg" alt="Rolls‑Royce Phantom"/>
```

## Next Steps

1. **Download/take photos** of your actual vehicles and services
2. **Optimize images** - compress them for web (keep under 500KB each)
3. **Add them to the appropriate folders**
4. **Update HTML files** to use local image paths instead of external URLs
5. **Test the website** to make sure all images load correctly

This will make your website:
- ✅ Faster (no external image loading)
- ✅ More reliable (no broken links if external sites change)
- ✅ Professional (your own branded images)
- ✅ Better for SEO (local images with proper alt text)