import {
  SidebarMenu,
  SidebarMenuButton,
  SidebarMenuItem,
} from "@/Components/ui/sidebar";
import ApplicationLogo from "../ApplicationLogo";
import { Link } from "@inertiajs/react";

export function NavHeader() {
  return (
    <SidebarMenu>
      <Link href="/">
        <SidebarMenuItem>
          <SidebarMenuButton
            size="lg"
            className="data-[state=open]:bg-sidebar-accent data-[state=open]:text-sidebar-accent-foreground"
          >
            <div className="grid flex-1 text-left text-sm leading-tight">
              <span className="truncate font-semibold">TimBurnOut</span>
              <span className="truncate text-xs">Dashboard</span>
            </div>
          </SidebarMenuButton>
        </SidebarMenuItem>
      </Link>
    </SidebarMenu>
  );
}
